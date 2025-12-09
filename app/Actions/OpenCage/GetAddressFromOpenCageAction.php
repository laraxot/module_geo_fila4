<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\OpenCage;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> be08416 (.)
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\AddressData;

/**
 * Classe per ottenere i dati dell'indirizzo dal servizio OpenCage.
 */
class GetAddressFromOpenCageAction
{
    private const BASE_URL = 'https://api.opencagedata.com/geocode/v1';

    /**
     * Esegue la ricerca dell'indirizzo su OpenCage.
     *
     * @param string $address L'indirizzo da cercare
     *
<<<<<<< HEAD
     * @throws \Exception Se la chiave API non è configurata
     *
     * @return AddressData|null I dati dell'indirizzo trovato o null se non trovato
     */
    public function execute(string $address): ?AddressData
=======
     * @throws Exception Se la chiave API non è configurata
     *
     * @return AddressData|null I dati dell'indirizzo trovato o null se non trovato
     */
    public function execute(string $address): null|AddressData
>>>>>>> be08416 (.)
    {
        $apiKey = config('services.opencage.key');

        if (empty($apiKey)) {
<<<<<<< HEAD
            throw new \Exception('OpenCage API key not configured');
        }

        $response = Http::get(self::BASE_URL.'/json', [
=======
            throw new Exception('OpenCage API key not configured');
        }

        $response = Http::get(self::BASE_URL . '/json', [
>>>>>>> be08416 (.)
            'q' => $address,
            'key' => $apiKey,
            'limit' => 1,
            'no_annotations' => 1,
        ]);

<<<<<<< HEAD
        if (! $response->successful()) {
=======
        if (!$response->successful()) {
>>>>>>> be08416 (.)
            return null;
        }

        /** @var array{results?: array<int, array{geometry?: array{lat?: float, lng?: float}, components?: array{country?: string, city?: string, town?: string, village?: string, country_code?: string, postcode?: string, suburb?: string, county?: string, road?: string, house_number?: string, state?: string}}>} $data */
        $data = $response->json();

        if (empty($data['results'])) {
            return null;
        }

        $result = $data['results'][0];
        $components = $result['components'] ?? [];

        return AddressData::from([
            'latitude' => (float) ($result['geometry']['lat'] ?? 0),
            'longitude' => (float) ($result['geometry']['lng'] ?? 0),
            'country' => $components['country'] ?? 'Italia',
            'city' => $components['city'] ?? $components['town'] ?? $components['village'] ?? '',
            'country_code' => $components['country_code'] ?? 'IT',
            'postal_code' => (int) ($components['postcode'] ?? 0),
            'locality' => $components['suburb'] ?? '',
            'county' => $components['county'] ?? '',
            'street' => $components['road'] ?? '',
            'street_number' => $components['house_number'] ?? '',
            'district' => $components['suburb'] ?? '',
            'state' => $components['state'] ?? '',
        ]);
    }
}
