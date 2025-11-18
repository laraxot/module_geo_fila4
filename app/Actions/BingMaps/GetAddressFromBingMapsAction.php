<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\BingMaps;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Modules\Geo\Datas\AddressData;
<<<<<<< HEAD
=======
use RuntimeException;
use Webmozart\Assert\Assert;
>>>>>>> 1bb689f (.)

use function Safe\json_decode;

/**
 * Action per ottenere l'indirizzo da coordinate tramite Bing Maps.
 *
 * Questa classe utilizza l'API Bing Maps Geocoding per convertire
 * un indirizzo in coordinate geografiche e dettagli dell'indirizzo.
 */
readonly class GetAddressFromBingMapsAction
{
    private const API_URL = 'http://dev.virtualearth.net/REST/v1/Locations';

    public function __construct(
        private Client $client,
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)

    /**
     * Ottiene i dettagli dell'indirizzo utilizzando Bing Maps.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata o la richiesta fallisce
=======
     * @throws RuntimeException Se la chiave API non è configurata o la richiesta fallisce
>>>>>>> 1bb689f (.)
     */
    public function execute(string $address): ?AddressData
    {
        $this->validateInput($address);

        try {
            $response = $this->makeApiRequest($address);

            return $this->parseResponse($response);
        } catch (GuzzleException $e) {
            Log::error('Bing Maps Geocoding API request failed', [
                'error' => $e->getMessage(),
                'address' => $address,
            ]);

            return null;
        }
    }

    /**
     * Valida i dati di input.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata
=======
     * @throws RuntimeException Se la chiave API non è configurata
>>>>>>> 1bb689f (.)
     */
    private function validateInput(string $address): void
    {
        $apiKey = config('services.bing.maps_api_key');
<<<<<<< HEAD
        if (empty($apiKey)) {
            throw new \RuntimeException('Bing Maps API key not configured');
        }
        if (empty($address)) {
            throw new \RuntimeException('Address cannot be empty');
        }
        if (strlen($address) > 1000) {
            throw new \RuntimeException('Address is too long');
        }
=======
        Assert::notEmpty($apiKey, 'Bing Maps API key not configured');
        Assert::notEmpty($address, 'Address cannot be empty');
        Assert::maxLength($address, 1000, 'Address is too long');
>>>>>>> 1bb689f (.)
    }

    /**
     * Effettua la richiesta all'API di Bing Maps.
     *
     * @throws GuzzleException Se la richiesta fallisce
     */
    private function makeApiRequest(string $address): string
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
                'query' => $address,
                'key' => config('services.bing.maps_api_key'),
                'maxResults' => 1,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * Elabora la risposta dell'API.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la risposta non è valida
=======
     * @throws RuntimeException Se la risposta non è valida
>>>>>>> 1bb689f (.)
     */
    private function parseResponse(string $response): ?AddressData
    {
        /** @var array{
         *     statusCode: int,
         *     resourceSets: array<array{
         *         resources: array<array{
         *             point: array{
         *                 coordinates: array<float>
         *             },
         *             address: array{
         *                 countryRegion: string,
         *                 locality: string,
         *                 postalCode: string,
         *                 addressLine: string,
         *                 adminDistrict: string
         *             }
         *         }>
         *     }>
         * } $data */
        $data = json_decode($response, true);

<<<<<<< HEAD
        if (200 !== $data['statusCode'] || empty($data['resourceSets'][0]['resources'])) {
=======
        if ($data['statusCode'] !== 200 || empty($data['resourceSets'][0]['resources'])) {
>>>>>>> 1bb689f (.)
            return null;
        }

        $resource = $data['resourceSets'][0]['resources'][0];
        $coordinates = $resource['point']['coordinates'];
        $address = $resource['address'];

        return AddressData::from([
            'latitude' => (float) ($coordinates[0] ?? 0),
            'longitude' => (float) ($coordinates[1] ?? 0),
            'country' => $address['countryRegion'] ?? 'Italia',
            'city' => $address['locality'] ?? '',
            'postal_code' => (int) ($address['postalCode'] ?? 0),
            'street' => $address['addressLine'] ?? '',
            'street_number' => '', // Bing Maps non fornisce direttamente il numero civico
            'province' => $address['adminDistrict'] ?? '',
        ]);
    }
}
