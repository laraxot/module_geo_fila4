<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\GoogleMaps;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Modules\Geo\Datas\GeocodingData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use RuntimeException;
use Webmozart\Assert\Assert;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

use function Safe\json_decode;

/**
 * Action per ottenere i dati di geocodifica da Google Maps.
 */
readonly class GetGeocodingDataAction
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
     * Ottiene i dati di geocodifica per un indirizzo.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
=======
     * @throws RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> 0746367 (.)
     */
    public function execute(string $address): GeocodingData
    {
        $this->validateInput($address);

        try {
            $response = $this->makeApiRequest($address);

            return $this->parseResponse($response);
        } catch (GuzzleException $e) {
            Log::error('Errore nella geocodifica', [
                'error' => $e->getMessage(),
                'address' => $address,
            ]);

            return GeocodingData::error('REQUEST_FAILED');
        }
    }

    /**
     * Valida i dati di input.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se i dati non sono validi
=======
     * @throws RuntimeException Se i dati non sono validi
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se i dati non sono validi
>>>>>>> 0746367 (.)
     */
    private function validateInput(string $address): void
    {
        // $apiKey = config('services.google_maps.api_key');
        $apiKey = config('services.google.maps_api_key');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
        if (empty($apiKey)) {
            throw new \RuntimeException('Chiave API Google Maps non configurata!');
        }
        if (empty($address)) {
            throw new \RuntimeException('Indirizzo non può essere vuoto');
        }
        if (strlen($address) > 1000) {
            throw new \RuntimeException('Indirizzo troppo lungo');
        }
<<<<<<< HEAD
=======
        Assert::notEmpty($apiKey, 'Chiave API Google Maps non configurata!');
        Assert::notEmpty($address, 'Indirizzo non può essere vuoto');
        Assert::maxLength($address, 1000, 'Indirizzo troppo lungo');
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
    }

    /**
     * @throws GuzzleException
     */
    private function makeApiRequest(string $address): string
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
                'address' => $address,
                'key' => config('geo.google_maps.api_key'),
                'language' => config('geo.google_maps.language', 'it'),
                'region' => config('geo.google_maps.region', 'IT'),
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la risposta non è nel formato atteso
=======
     * @throws RuntimeException Se la risposta non è nel formato atteso
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la risposta non è nel formato atteso
>>>>>>> 0746367 (.)
     */
    private function parseResponse(string $response): GeocodingData
    {
        /** @var array{
         *     status: string,
         *     results?: array<array{
         *         geometry: array{
         *             location: array{
         *                 lat: float,
         *                 lng: float
         *             }
         *         },
         *         formatted_address: string,
         *         address_components: array<array{
         *             long_name: string,
         *             short_name: string,
         *             types: array<string>
         *         }>
         *     }>,
         *     error_message?: string
         * } $data */
        $data = json_decode($response, true);

<<<<<<< HEAD
<<<<<<< HEAD
        if ('OK' !== $data['status'] || empty($data['results'])) {
=======
        if ($data['status'] !== 'OK' || empty($data['results'])) {
>>>>>>> 1bb689f (.)
=======
        if ('OK' !== $data['status'] || empty($data['results'])) {
>>>>>>> 0746367 (.)
            Log::warning('Geocodifica fallita', [
                'status' => $data['status'],
                'error' => $data['error_message'] ?? 'Nessun risultato trovato',
            ]);

            return GeocodingData::error($data['status']);
        }

        return GeocodingData::fromGoogleResponse($data);
    }
}
