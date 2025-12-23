<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\GoogleMaps;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Modules\Geo\Datas\LocationData;
<<<<<<< HEAD
<<<<<<< HEAD

use function Safe\json_decode;

use Webmozart\Assert\Assert;

=======
use RuntimeException;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

>>>>>>> 1bb689f (.)
=======

use function Safe\json_decode;

use Webmozart\Assert\Assert;

>>>>>>> 0746367 (.)
/**
 * Action per ottenere le coordinate da un indirizzo tramite Google Maps.
 *
 * Questa classe utilizza l'API Google Maps Geocoding per convertire
 * un indirizzo testuale in coordinate geografiche.
 */
readonly class GetCoordinatesFromGoogleMapsAction
{
    private const API_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    public function __construct(
        private Client $client,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)
=======
    ) {
    }
>>>>>>> 0746367 (.)

    /**
     * Ottiene le coordinate da un indirizzo.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata o la richiesta fallisce
=======
     * @throws RuntimeException Se la chiave API non è configurata o la richiesta fallisce
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la chiave API non è configurata o la richiesta fallisce
>>>>>>> 0746367 (.)
     */
    public function execute(string $address): LocationData
    {
        $this->validateInput($address);

        try {
            $response = $this->makeApiRequest($address);

            return $this->parseResponse($response, $address);
        } catch (GuzzleException $e) {
            Log::error('Google Maps Geocoding API request failed', [
                'error' => $e->getMessage(),
                'address' => $address,
            ]);

<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Failed to get coordinates from address');
=======
            throw new RuntimeException('Failed to get coordinates from address');
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Failed to get coordinates from address');
>>>>>>> 0746367 (.)
        }
    }

    /**
     * Valida i dati di input.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata
=======
     * @throws RuntimeException Se la chiave API non è configurata
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la chiave API non è configurata
>>>>>>> 0746367 (.)
     */
    private function validateInput(string $address): void
    {
        $apiKey = config('services.google.maps_api_key');
        Assert::notEmpty($apiKey, 'Google Maps API key not configured');
        Assert::notEmpty($address, 'Address cannot be empty');
        Assert::maxLength($address, 1000, 'Address is too long');
    }

    /**
     * Effettua la richiesta all'API di Google Maps.
     *
     * @throws GuzzleException Se la richiesta fallisce
     */
    private function makeApiRequest(string $address): string
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
                'address' => $address,
                'key' => config('services.google.maps_api_key'),
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * Elabora la risposta dell'API.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la risposta non è valida
=======
     * @throws RuntimeException Se la risposta non è valida
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la risposta non è valida
>>>>>>> 0746367 (.)
     */
    private function parseResponse(string $response, string $address): LocationData
    {
        /** @var array{
         *     results: array<array{
         *         geometry: array{
         *             location: array{
         *                 lat: float,
         *                 lng: float
         *             }
         *         }
         *     }>,
         *     status: string
         * } $data */
        $data = json_decode($response, true);

<<<<<<< HEAD
<<<<<<< HEAD
        if ('OK' !== $data['status'] || empty($data['results'][0]['geometry']['location'])) {
            throw new \RuntimeException('No coordinates found for address');
=======
        if ($data['status'] !== 'OK' || empty($data['results'][0]['geometry']['location'])) {
            throw new RuntimeException('No coordinates found for address');
>>>>>>> 1bb689f (.)
=======
        if ('OK' !== $data['status'] || empty($data['results'][0]['geometry']['location'])) {
            throw new \RuntimeException('No coordinates found for address');
>>>>>>> 0746367 (.)
        }

        $location = $data['results'][0]['geometry']['location'];

        return new LocationData(
            address: $address,
            latitude: $location['lat'],
            longitude: $location['lng'],
        );
    }
}
