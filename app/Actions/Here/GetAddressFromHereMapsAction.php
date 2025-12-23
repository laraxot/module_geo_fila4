<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Here;

<<<<<<< HEAD
<<<<<<< HEAD
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
=======
use Exception;
>>>>>>> 1bb689f (.)
=======
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
>>>>>>> 0746367 (.)
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\AddressData;
use Modules\Geo\Datas\HereMap\HereMapResponseData;

class GetAddressFromHereMapsAction
{
    private const BASE_URL = 'https://geocode.search.hereapi.com/v1/geocode';

    public function execute(string $address): ?AddressData
    {
        $apiKey = config('services.here.key');

        if (empty($apiKey)) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \Exception('Here Maps API key not configured');
=======
            throw new Exception('Here Maps API key not configured');
>>>>>>> 1bb689f (.)
=======
            throw new \Exception('Here Maps API key not configured');
>>>>>>> 0746367 (.)
        }

        $response = Http::get(self::BASE_URL, [
            'q' => $address,
            'apiKey' => $apiKey,
            'limit' => 1,
        ]);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
        // Handle PromiseInterface|Response union type
        if ($response instanceof PromiseInterface) {
            $response = $response->wait();
        }

        /** @var Response $response */
<<<<<<< HEAD
=======
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
        if (! $response->successful()) {
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
