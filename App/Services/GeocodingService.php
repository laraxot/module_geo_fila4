<?php

declare(strict_types=1);

namespace Modules\Geo\App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Log;

/**
 * Servizio per la geocodifica di indirizzi e coordinate.
 *
 * Fornisce funzionalità per convertire indirizzi in coordinate
 * e viceversa, utilizzando servizi esterni di geocoding.
 */
class GeocodingService
{
    private const CACHE_TTL = 3600; // 1 ora

    private const MAX_RETRIES = 3;

    private const RETRY_DELAY = 1000; // 1 secondo

    /**
     * Geocodifica un indirizzo in coordinate.
     */
    public function geocodeAddress(string $address): array
    {
        $cacheKey = 'geocode:'.md5($address);

        $result = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($address) {
            return $this->performGeocoding($address);
        });

        return is_array($result) ? $result : [];
    }

    /**
     * Ottiene suggerimenti per un indirizzo.
     */
    public function getSuggestions(string $query): array
    {
        $cacheKey = 'geocode_suggestions:'.md5($query);

        $result = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($query) {
            return $this->performSuggestionSearch($query);
        });

        return is_array($result) ? $result : [];
    }

    /**
     * Geocodifica inversa: coordinate in indirizzo.
     */
    public function reverseGeocode(float $latitude, float $longitude): array
    {
        $cacheKey = 'reverse_geocode:'.md5("{$latitude},{$longitude}");

        $result = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($latitude, $longitude) {
            return $this->performReverseGeocoding($latitude, $longitude);
        });

        return is_array($result) ? $result : [];
    }

    /**
     * Esegue la geocodifica effettiva.
     */
    private function performGeocoding(string $address): array
    {
        // Prova prima con OpenStreetMap Nominatim (gratuito)
        try {
            $result = $this->geocodeWithNominatim($address);
            if ($result) {
                return $result;
            }
        } catch (Exception $e) {
            Log::warning('Nominatim geocoding failed', [
                'address' => $address,
                'error' => $e->getMessage(),
            ]);
        }

        // Fallback su Google Maps (se configurato)
        try {
            $result = $this->geocodeWithGoogleMaps($address);
            if ($result) {
                return $result;
            }
        } catch (Exception $e) {
            Log::warning('Google Maps geocoding failed', [
                'address' => $address,
                'error' => $e->getMessage(),
            ]);
        }

        throw new Exception('Impossibile geocodificare l\'indirizzo: '.$address);
    }

    /**
     * Geocodifica con OpenStreetMap Nominatim.
     */
    private function geocodeWithNominatim(string $address): ?array
    {
        $response = Http::timeout(10)
            ->retry(self::MAX_RETRIES, self::RETRY_DELAY)
            ->get('https://nominatim.openstreetmap.org/search', [
                'q' => $address,
                'format' => 'json',
                'limit' => 1,
                'addressdetails' => 1,
                'countrycodes' => 'it', // Limita all'Italia
                'accept-language' => 'it,en',
            ]);

        if (! $response->successful()) {
            throw new Exception('Nominatim API error: '.$response->status());
        }

        $data = $response->json();

        if (! is_array($data) || empty($data)) {
            return null;
        }

        $result = $data[0];

        if (! is_array($result)) {
            return null;
        }

        $address = $result['address'] ?? [];
        $address = is_array($address) ? $address : [];

        return [
            'address' => $result['display_name'] ?? '',
            'latitude' => (float) ($result['lat'] ?? 0),
            'longitude' => (float) ($result['lon'] ?? 0),
            'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? null,
            'country' => $address['country'] ?? null,
            'postal_code' => $address['postcode'] ?? null,
            'provider' => 'nominatim',
        ];
    }

    /**
     * Geocodifica con Google Maps (se configurato).
     */
    private function geocodeWithGoogleMaps(string $address): ?array
    {
        $apiKey = config('services.google.maps_api_key');

        if (! $apiKey) {
            return null;
        }

        $response = Http::timeout(10)
            ->retry(self::MAX_RETRIES, self::RETRY_DELAY)
            ->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $address,
                'key' => $apiKey,
                'language' => 'it',
                'region' => 'it',
            ]);

        if (! $response->successful()) {
            throw new Exception('Google Maps API error: '.$response->status());
        }

        $data = $response->json();

        if (! is_array($data) || ($data['status'] ?? '') !== 'OK' || empty($data['results'] ?? [])) {
            return null;
        }

        $results = $data['results'] ?? [];
        $results = is_array($results) ? $results : [];
        if (empty($results) || ! is_array($results[0] ?? null)) {
            return null;
        }

        $result = $results[0];
        $geometry = $result['geometry'] ?? [];
        $geometry = is_array($geometry) ? $geometry : [];
        $location = $geometry['location'] ?? [];
        $location = is_array($location) ? $location : [];

        return [
            'address' => $result['formatted_address'] ?? '',
            'latitude' => (float) ($location['lat'] ?? 0),
            'longitude' => (float) ($location['lng'] ?? 0),
            'city' => $this->extractCityFromGoogleResult($result),
            'country' => $this->extractCountryFromGoogleResult($result),
            'postal_code' => $this->extractPostalCodeFromGoogleResult($result),
            'provider' => 'google_maps',
        ];
    }

    /**
     * Esegue la ricerca di suggerimenti.
     */
    private function performSuggestionSearch(string $query): array
    {
        try {
            $response = Http::timeout(10)
                ->retry(self::MAX_RETRIES, self::RETRY_DELAY)
                ->get('https://nominatim.openstreetmap.org/search', [
                    'q' => $query,
                    'format' => 'json',
                    'limit' => 5,
                    'addressdetails' => 1,
                    'countrycodes' => 'it',
                    'accept-language' => 'it,en',
                ]);

            if (! $response->successful()) {
                throw new Exception('Nominatim API error: '.$response->status());
            }

            $data = $response->json();

            if (! is_array($data)) {
                return [];
            }

            return array_map(function ($item) {
                if (! is_array($item)) {
                    return [
                        'address' => '',
                        'latitude' => 0.0,
                        'longitude' => 0.0,
                        'city' => null,
                        'country' => null,
                        'postal_code' => null,
                    ];
                }

                $address = $item['address'] ?? [];
                $address = is_array($address) ? $address : [];

                return [
                    'address' => $item['display_name'] ?? '',
                    'latitude' => (float) ($item['lat'] ?? 0),
                    'longitude' => (float) ($item['lon'] ?? 0),
                    'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? null,
                    'country' => $address['country'] ?? null,
                    'postal_code' => $address['postcode'] ?? null,
                ];
            }, $data);

        } catch (Exception $e) {
            Log::warning('Suggestion search failed', [
                'query' => $query,
                'error' => $e->getMessage(),
            ]);

            return [];
        }
    }

    /**
     * Esegue la geocodifica inversa.
     */
    private function performReverseGeocoding(float $latitude, float $longitude): array
    {
        try {
            $response = Http::timeout(10)
                ->retry(self::MAX_RETRIES, self::RETRY_DELAY)
                ->get('https://nominatim.openstreetmap.org/reverse', [
                    'lat' => $latitude,
                    'lon' => $longitude,
                    'format' => 'json',
                    'addressdetails' => 1,
                    'accept-language' => 'it,en',
                ]);

            if (! $response->successful()) {
                throw new Exception('Nominatim API error: '.$response->status());
            }

            $data = $response->json();

            if (! is_array($data)) {
                throw new Exception('Invalid response from Nominatim');
            }

            $address = $data['address'] ?? [];
            $address = is_array($address) ? $address : [];

            return [
                'address' => $data['display_name'] ?? '',
                'latitude' => $latitude,
                'longitude' => $longitude,
                'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? null,
                'country' => $address['country'] ?? null,
                'postal_code' => $address['postcode'] ?? null,
                'provider' => 'nominatim',
            ];

        } catch (Exception $e) {
            Log::warning('Reverse geocoding failed', [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'error' => $e->getMessage(),
            ]);

            throw new Exception('Impossibile eseguire la geocodifica inversa');
        }
    }

    /**
     * Estrae la città dal risultato di Google Maps.
     */
    private function extractCityFromGoogleResult(array $result): ?string
    {
        $addressComponents = $result['address_components'] ?? [];
        if (! is_array($addressComponents)) {
            return null;
        }

        foreach ($addressComponents as $component) {
            if (! is_array($component)) {
                continue;
            }

            $types = $component['types'] ?? [];
            if (! is_array($types)) {
                continue;
            }

            if (in_array('locality', $types, true) ||
                in_array('administrative_area_level_2', $types, true)) {
                $longName = $component['long_name'] ?? null;
                return is_string($longName) ? $longName : null;
            }
        }

        return null;
    }

    /**
     * Estrae il paese dal risultato di Google Maps.
     */
    private function extractCountryFromGoogleResult(array $result): ?string
    {
        $addressComponents = $result['address_components'] ?? [];
        if (! is_array($addressComponents)) {
            return null;
        }

        foreach ($addressComponents as $component) {
            if (! is_array($component)) {
                continue;
            }

            $types = $component['types'] ?? [];
            if (! is_array($types)) {
                continue;
            }

            if (in_array('country', $types, true)) {
                $longName = $component['long_name'] ?? null;
                return is_string($longName) ? $longName : null;
            }
        }

        return null;
    }

    /**
     * Estrae il codice postale dal risultato di Google Maps.
     */
    private function extractPostalCodeFromGoogleResult(array $result): ?string
    {
        $addressComponents = $result['address_components'] ?? [];
        if (! is_array($addressComponents)) {
            return null;
        }

        foreach ($addressComponents as $component) {
            if (! is_array($component)) {
                continue;
            }

            $types = $component['types'] ?? [];
            if (! is_array($types)) {
                continue;
            }

            if (in_array('postal_code', $types, true)) {
                $longName = $component['long_name'] ?? null;
                return is_string($longName) ? $longName : null;
            }
        }

        return null;
    }

    /**
     * Pulisce la cache di geocoding.
     */
    public function clearCache(): void
    {
        Cache::forget('geocode:*');
        Cache::forget('geocode_suggestions:*');
        Cache::forget('reverse_geocode:*');
    }

    /**
     * Ottiene statistiche sulla cache di geocoding.
     */
    public function getCacheStats(): array
    {
        // Implementazione semplificata per le statistiche cache
        return [
            'cache_enabled' => Cache::getStore() !== null,
            'ttl' => self::CACHE_TTL,
            'max_retries' => self::MAX_RETRIES,
        ];
    }
}
