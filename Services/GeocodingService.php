<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Geocoding Service
 * 
 * Provides geocoding and reverse geocoding functionality
 * using OpenStreetMap Nominatim API with caching
 */
class GeocodingService
{
    /**
     * Cache TTL in seconds (30 days)
     */
    protected int $cacheTtl = 2592000;

    /**
     * Nominatim API base URL
     */
    protected string $apiUrl = 'https://nominatim.openstreetmap.org';

    /**
     * User agent for API requests
     */
    protected string $userAgent;

    public function __construct()
    {
        $appName = config('app.name');
        $this->userAgent = (is_string($appName) ? $appName : 'FixCity') . ' (contact@fixcity.it)';
    }

    /**
     * Geocode address to coordinates
     */
    public function geocode(string $address): ?array
    {
        $cacheKey = $this->getCacheKey('geocode', $address);

        $result = Cache::remember($cacheKey, $this->cacheTtl, function () use ($address) {
            return $this->fetchGeocode($address);
        });
        
        return is_array($result) ? $result : null;
    }

    /**
     * Reverse geocode coordinates to address
     */
    public function reverseGeocode(float $latitude, float $longitude): ?string
    {
        $cacheKey = $this->getCacheKey('reverse', [$latitude, $longitude]);

        $result = Cache::remember($cacheKey, $this->cacheTtl, function () use ($latitude, $longitude) {
            return $this->fetchReverseGeocode($latitude, $longitude);
        });
        
        return is_string($result) ? $result : null;
    }

    /**
     * Get coordinates for address
     */
    public function getCoordinates(string $address): ?array
    {
        $result = $this->geocode($address);

        if (! $result) {
            return null;
        }

        return [
            'latitude' => $result['latitude'],
            'longitude' => $result['longitude'],
        ];
    }

    /**
     * Get address for coordinates
     */
    public function getAddress(float $latitude, float $longitude): ?string
    {
        return $this->reverseGeocode($latitude, $longitude);
    }

    /**
     * Calculate distance between two points (Haversine formula)
     * 
     * @return float Distance in meters
     */
    public function calculateDistance(
        float $lat1,
        float $lon1,
        float $lat2,
        float $lon2
    ): float {
        $earthRadius = 6371000; // meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    /**
     * Check if point is within radius of center
     */
    public function isWithinRadius(
        float $centerLat,
        float $centerLon,
        float $pointLat,
        float $pointLon,
        float $radiusMeters
    ): bool {
        $distance = $this->calculateDistance($centerLat, $centerLon, $pointLat, $pointLon);

        return $distance <= $radiusMeters;
    }

    /**
     * Fetch geocode from API
     */
    protected function fetchGeocode(string $address): ?array
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders(['User-Agent' => $this->userAgent])
                ->get("{$this->apiUrl}/search", [
                    'q' => $address,
                    'format' => 'json',
                    'addressdetails' => 1,
                    'limit' => 1,
                    'accept-language' => 'it',
                ]);

            if ($response->successful()) {
                $data = $response->json();

                if (is_array($data) && ! empty($data) && isset($data[0]) && is_array($data[0])) {
                    $result = $data[0];

                    return [
                        'latitude' => is_numeric($result['lat'] ?? null) ? (float) $result['lat'] : 0.0,
                        'longitude' => is_numeric($result['lon'] ?? null) ? (float) $result['lon'] : 0.0,
                        'display_name' => is_string($result['display_name'] ?? null) ? $result['display_name'] : '',
                        'address' => is_array($result['address'] ?? null) ? $result['address'] : [],
                    ];
                }
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Geocoding failed', [
                'address' => $address,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Fetch reverse geocode from API
     */
    protected function fetchReverseGeocode(float $latitude, float $longitude): ?string
    {
        try {
            $response = Http::timeout(10)
                ->withHeaders(['User-Agent' => $this->userAgent])
                ->get("{$this->apiUrl}/reverse", [
                    'lat' => $latitude,
                    'lon' => $longitude,
                    'format' => 'json',
                    'addressdetails' => 1,
                    'accept-language' => 'it',
                ]);

            if ($response->successful()) {
                $data = $response->json();

                if (is_array($data) && isset($data['display_name']) && is_string($data['display_name'])) {
                    return $this->formatAddress($data);
                }
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Reverse geocoding failed', [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Format address from Nominatim response
     */
    protected function formatAddress(array $data): string
    {
        $address = is_array($data['address'] ?? null) ? $data['address'] : [];
        $parts = [];

        // Street
        if (isset($address['road']) && is_string($address['road'])) {
            $street = $address['road'];
            if (isset($address['house_number']) && is_string($address['house_number'])) {
                $street .= ' ' . $address['house_number'];
            }
            $parts[] = $street;
        }

        // City
        if (isset($address['city']) && is_string($address['city'])) {
            $parts[] = $address['city'];
        } elseif (isset($address['town']) && is_string($address['town'])) {
            $parts[] = $address['town'];
        } elseif (isset($address['village']) && is_string($address['village'])) {
            $parts[] = $address['village'];
        }

        // Province/State
        if (isset($address['state']) && is_string($address['state'])) {
            $parts[] = $address['state'];
        }

        // Postcode
        if (isset($address['postcode']) && is_string($address['postcode'])) {
            $parts[] = $address['postcode'];
        }

        // Country
        if (isset($address['country']) && is_string($address['country'])) {
            $parts[] = $address['country'];
        }

        $displayName = is_string($data['display_name'] ?? null) ? $data['display_name'] : '';
        return ! empty($parts) ? implode(', ', $parts) : $displayName;
    }

    /**
     * Get cache key
     */
    protected function getCacheKey(string $type, mixed $identifier): string
    {
        return sprintf('geo:%s:%s', $type, md5(serialize($identifier)));
    }

    /**
     * Clear cache for specific key
     */
    public function clearCache(string $type, mixed $identifier): void
    {
        $key = $this->getCacheKey($type, $identifier);
        Cache::forget($key);
    }

    /**
     * Clear all geocoding cache
     */
    public function clearAllCache(): void
    {
        Cache::tags(['geo'])->flush();
    }
}
