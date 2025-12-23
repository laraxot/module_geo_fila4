<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Elevation;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Modules\Geo\Datas\ElevationData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

use function Safe\json_decode;

/**
 * Action per ottenere l'elevazione di un punto usando OpenElevation API.
 */
readonly class FetchOpenElevationAction
{
    private const API_URL = 'https://api.open-elevation.com/api/v1/lookup';

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
     * Ottiene l'elevazione per un punto.
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
    public function execute(float $latitude, float $longitude): ElevationData
    {
        try {
            $response = $this->makeApiRequest($latitude, $longitude);

            return $this->parseResponse($response);
        } catch (GuzzleException $e) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Failed to get elevation data: '.$e->getMessage());
=======
            throw new RuntimeException('Failed to get elevation data: '.$e->getMessage());
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Failed to get elevation data: '.$e->getMessage());
>>>>>>> 0746367 (.)
        }
    }

    /**
     * @throws GuzzleException
     */
    private function makeApiRequest(float $latitude, float $longitude): string
    {
        $response = $this->client->post(self::API_URL, [
            'json' => [
                'locations' => [
                    [
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                    ],
                ],
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
    private function parseResponse(string $response): ElevationData
    {
        /** @var array{
         *     results: array<array{
         *         latitude: float,
         *         longitude: float,
         *         elevation: float
         *     }>
         * } $data */
        $data = json_decode($response, true);

        if (empty($data['results'][0])) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Invalid elevation data response');
=======
            throw new RuntimeException('Invalid elevation data response');
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Invalid elevation data response');
>>>>>>> 0746367 (.)
        }

        $result = $data['results'][0];

        return new ElevationData(
            latitude: $result['latitude'],
            longitude: $result['longitude'],
            elevation: $result['elevation'],
        );
    }
}
