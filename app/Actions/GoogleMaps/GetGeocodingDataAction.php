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
use Modules\Geo\Datas\GeocodingData;
<<<<<<< HEAD

use function Safe\json_decode;

use Webmozart\Assert\Assert;

=======
use Webmozart\Assert\Assert;

use function Safe\json_decode;

>>>>>>> be08416 (.)
/**
 * Action per ottenere i dati di geocodifica da Google Maps.
 */
readonly class GetGeocodingDataAction
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
     * Ottiene i dati di geocodifica per un indirizzo.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
=======
     * @throws RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> be08416 (.)
     */
    public function execute(string $address): GeocodingData
    {
        $this->validateInput($address);

        try {
            $response = $this->makeApiRequest($address);
<<<<<<< HEAD

            return $this->parseResponse($response);
=======
            $parsedResponse = $this->parseResponse($response);

            return $parsedResponse;
>>>>>>> be08416 (.)
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
     * @throws \RuntimeException Se i dati non sono validi
=======
     * @throws RuntimeException Se i dati non sono validi
>>>>>>> be08416 (.)
     */
    private function validateInput(string $address): void
    {
        // $apiKey = config('services.google_maps.api_key');
        $apiKey = config('services.google.maps_api_key');
        Assert::notEmpty($apiKey, 'Chiave API Google Maps non configurata!');
        Assert::notEmpty($address, 'Indirizzo non può essere vuoto');
        Assert::maxLength($address, 1000, 'Indirizzo troppo lungo');
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
     * @throws \RuntimeException Se la risposta non è nel formato atteso
=======
     * @throws RuntimeException Se la risposta non è nel formato atteso
>>>>>>> be08416 (.)
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

        if ('OK' !== $data['status'] || empty($data['results'])) {
            Log::warning('Geocodifica fallita', [
                'status' => $data['status'],
                'error' => $data['error_message'] ?? 'Nessun risultato trovato',
            ]);

            return GeocodingData::error($data['status']);
        }

        return GeocodingData::fromGoogleResponse($data);
    }
}
