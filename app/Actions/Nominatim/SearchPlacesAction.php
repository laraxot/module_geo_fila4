<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Nominatim;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Modules\Geo\Datas\LocationData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

use function Safe\json_decode;

/**
 * Action per cercare luoghi usando Nominatim.
 */
class SearchPlacesAction
{
    private const API_URL = 'https://nominatim.openstreetmap.org/search';

    private Client $client;

    private string $userAgent;

    public function __construct(string $userAgent)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->client = new Client();
=======
        $this->client = new Client;
>>>>>>> 1bb689f (.)
=======
        $this->client = new Client();
>>>>>>> 0746367 (.)
        $this->userAgent = $userAgent.' Application';
    }

    /**
     * Cerca luoghi usando una query di ricerca.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la richiesta fallisce
     *
     * @return Collection<int, LocationData>
=======
     * @return Collection<int, LocationData>
     *
     * @throws RuntimeException Se la richiesta fallisce
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la richiesta fallisce
     *
     * @return Collection<int, LocationData>
>>>>>>> 0746367 (.)
     */
    public function execute(string $query, ?string $country = null, int $limit = 10): Collection
    {
        try {
            $response = $this->makeApiRequest($query, $country, $limit);

            return $this->parseResponse($response);
        } catch (GuzzleException $e) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Failed to search places: '.$e->getMessage());
=======
            throw new RuntimeException('Failed to search places: '.$e->getMessage());
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Failed to search places: '.$e->getMessage());
>>>>>>> 0746367 (.)
        }
    }

    /**
     * @throws GuzzleException
     */
    private function makeApiRequest(string $query, ?string $country = null, int $limit = 10): string
    {
        $params = [
            'q' => $query,
            'format' => 'json',
            'addressdetails' => 1,
            'limit' => $limit,
            'accept-language' => 'it',
        ];

        if ($country) {
            $params['countrycodes'] = $country;
        }

        $response = $this->client->get(self::API_URL, [
            'query' => $params,
            'headers' => [
                'User-Agent' => $this->userAgent,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws \RuntimeException Se la risposta non è nel formato atteso
     *
     * @return Collection<int, LocationData>
=======
     * @return Collection<int, LocationData>
     *
     * @throws RuntimeException Se la risposta non è nel formato atteso
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la risposta non è nel formato atteso
     *
     * @return Collection<int, LocationData>
>>>>>>> 0746367 (.)
     */
    private function parseResponse(string $response): Collection
    {
        /** @var array<array{
         *     display_name: string,
         *     lat: string,
         *     lon: string,
         *     type: string,
         *     importance: float,
         *     address: array
         * }> $data */
        $data = json_decode($response, true);

        if (empty($data)) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('No results found for query');
=======
            throw new RuntimeException('No results found for query');
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('No results found for query');
>>>>>>> 0746367 (.)
        }

        return collect($data)->map(fn (array $place): LocationData => new LocationData(
            latitude: (float) $place['lat'],
            longitude: (float) $place['lon'],
            address: $place['display_name'],
        ));
    }
}
