<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Here;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> be08416 (.)
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\AddressData;
use Modules\Geo\Datas\HereMap\HereMapResponseData;

class GetAddressFromHereMapsAction
{
    private const BASE_URL = 'https://geocode.search.hereapi.com/v1/geocode';

<<<<<<< HEAD
    public function execute(string $address): ?AddressData
=======
    public function execute(string $address): null|AddressData
>>>>>>> be08416 (.)
    {
        $apiKey = config('services.here.key');

        if (empty($apiKey)) {
<<<<<<< HEAD
            throw new \Exception('Here Maps API key not configured');
=======
            throw new Exception('Here Maps API key not configured');
>>>>>>> be08416 (.)
        }

        $response = Http::get(self::BASE_URL, [
            'q' => $address,
            'apiKey' => $apiKey,
            'limit' => 1,
        ]);

<<<<<<< HEAD
        if (! $response->successful()) {
=======
        if (!$response->successful()) {
>>>>>>> be08416 (.)
            return null;
        }

        $responseData = HereMapResponseData::from($response->json());

        if (empty($responseData->position) || empty($responseData->address)) {
            return null;
        }

        return AddressData::from([
            'latitude' => (float) ($responseData->position['lat'] ?? 0),
            'longitude' => (float) ($responseData->position['lng'] ?? 0),
            'country' => $responseData->address['countryName'] ?? 'Italia',
            'city' => $responseData->address['city'] ?? '',
            'postal_code' => (int) ($responseData->address['postalCode'] ?? 0),
            'street' => $responseData->address['street'] ?? '',
            'street_number' => $responseData->address['houseNumber'] ?? '',
        ]);
    }
}
