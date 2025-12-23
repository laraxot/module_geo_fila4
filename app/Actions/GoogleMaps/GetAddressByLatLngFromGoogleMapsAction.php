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
 * Action per ottenere l'indirizzo da coordinate tramite Google Maps.
 *
 * Questa classe utilizza l'API Google Maps Reverse Geocoding per convertire
 * coordinate geografiche in un indirizzo formattato.
 */
readonly class GetAddressByLatLngFromGoogleMapsAction
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
     * Ottiene l'indirizzo dalle coordinate.
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
    public function execute(float $latitude, float $longitude): LocationData
    {
        $this->validateInput($latitude, $longitude);

        try {
            $response = $this->makeApiRequest($latitude, $longitude);

            return $this->parseResponse($response, $latitude, $longitude);
        } catch (GuzzleException $e) {
            Log::error('Google Maps Reverse Geocoding API request failed', [
                'error' => $e->getMessage(),
                'coordinates' => compact('latitude', 'longitude'),
            ]);

<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Failed to get address from coordinates');
=======
            throw new RuntimeException('Failed to get address from coordinates');
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Failed to get address from coordinates');
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
    private function validateInput(float $latitude, float $longitude): void
    {
        $apiKey = config('services.google.maps_api_key');
        Assert::notEmpty($apiKey, 'Google Maps API key not configured');
        Assert::range($latitude, -90, 90, 'Invalid latitude');
        Assert::range($longitude, -180, 180, 'Invalid longitude');
    }

    /**
     * Effettua la richiesta all'API di Google Maps.
     *
     * @throws GuzzleException Se la richiesta fallisce
     */
    private function makeApiRequest(float $latitude, float $longitude): string
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
                'latlng' => sprintf('%F,%F', $latitude, $longitude),
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
    private function parseResponse(string $response, float $latitude, float $longitude): LocationData
    {
        /** @var array{
         *     results: array<array{
         *         formatted_address: string,
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
        if ('OK' !== $data['status'] || empty($data['results'][0])) {
            throw new \RuntimeException('No address found for coordinates');
=======
        if ($data['status'] !== 'OK' || empty($data['results'][0])) {
            throw new RuntimeException('No address found for coordinates');
>>>>>>> 1bb689f (.)
=======
        if ('OK' !== $data['status'] || empty($data['results'][0])) {
            throw new \RuntimeException('No address found for coordinates');
>>>>>>> 0746367 (.)
        }

        $result = $data['results'][0];

        return new LocationData(
            address: $result['formatted_address'],
            latitude: $latitude,
            longitude: $longitude,
        );
    }
}
