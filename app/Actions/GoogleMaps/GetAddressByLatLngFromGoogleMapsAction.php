<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\GoogleMaps;

<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> be08416 (.)
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Modules\Geo\Datas\LocationData;
<<<<<<< HEAD

use function Safe\json_decode;

use Webmozart\Assert\Assert;

=======
use Webmozart\Assert\Assert;

use function Safe\json_decode;

>>>>>>> be08416 (.)
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
<<<<<<< HEAD
        private Client $client,
    ) {
    }
=======
        private  Client $client,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Ottiene l'indirizzo dalle coordinate.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata o la richiesta fallisce
=======
     * @throws RuntimeException Se la chiave API non è configurata o la richiesta fallisce
>>>>>>> be08416 (.)
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
            throw new \RuntimeException('Failed to get address from coordinates');
=======
            throw new RuntimeException('Failed to get address from coordinates');
>>>>>>> be08416 (.)
        }
    }

    /**
     * Valida i dati di input.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la chiave API non è configurata
=======
     * @throws RuntimeException Se la chiave API non è configurata
>>>>>>> be08416 (.)
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
     * @throws \RuntimeException Se la risposta non è valida
=======
     * @throws RuntimeException Se la risposta non è valida
>>>>>>> be08416 (.)
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

        if ('OK' !== $data['status'] || empty($data['results'][0])) {
<<<<<<< HEAD
            throw new \RuntimeException('No address found for coordinates');
=======
            throw new RuntimeException('No address found for coordinates');
>>>>>>> be08416 (.)
        }

        $result = $data['results'][0];

        return new LocationData(
            address: $result['formatted_address'],
            latitude: $latitude,
            longitude: $longitude,
        );
    }
}
