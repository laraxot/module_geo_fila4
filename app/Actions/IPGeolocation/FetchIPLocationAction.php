<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\IPGeolocation;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Modules\Geo\Datas\IPLocationData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

use function Safe\json_decode;

/**
 * Action per ottenere informazioni di geolocalizzazione da un indirizzo IP.
 */
class FetchIPLocationAction
{
    private const API_URL = 'http://ip-api.com/json/';

    private Client $client;

    public function __construct()
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
    }

    /**
     * Ottiene le informazioni di geolocalizzazione per un indirizzo IP.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $ip Indirizzo IP da geolocalizzare
     *
     * @throws GuzzleException
     * @throws \RuntimeException
=======
     * @param  string  $ip  Indirizzo IP da geolocalizzare
     *
     * @throws GuzzleException
     * @throws RuntimeException
>>>>>>> 1bb689f (.)
=======
     * @param string $ip Indirizzo IP da geolocalizzare
     *
     * @throws GuzzleException
     * @throws \RuntimeException
>>>>>>> 0746367 (.)
     */
    public function execute(string $ip): IPLocationData
    {
        $response = $this->client->get(self::API_URL.$ip, [
            'query' => [
                'fields' => implode(',', [
                    'status',
                    'message',
                    'country',
                    'countryCode',
                    'region',
                    'regionName',
                    'city',
                    'lat',
                    'lon',
                    'timezone',
                    'isp',
                ]),
            ],
        ]);

        /** @var array{
         *     status: string,
         *     message?: string,
         *     country?: string,
         *     countryCode?: string,
         *     region?: string,
         *     regionName?: string,
         *     city?: string,
         *     lat?: float,
         *     lon?: float,
         *     timezone?: string,
         *     isp?: string
         * } $data
         */
        $data = json_decode($response->getBody()->getContents(), true);

<<<<<<< HEAD
<<<<<<< HEAD
        if ('success' !== $data['status']) {
            throw new \RuntimeException('Failed to get IP location: '.($data['message'] ?? 'Unknown error'));
=======
        if ($data['status'] !== 'success') {
            throw new RuntimeException('Failed to get IP location: '.($data['message'] ?? 'Unknown error'));
>>>>>>> 1bb689f (.)
=======
        if ('success' !== $data['status']) {
            throw new \RuntimeException('Failed to get IP location: '.($data['message'] ?? 'Unknown error'));
>>>>>>> 0746367 (.)
        }

        return new IPLocationData(
            ip: $ip,
            city: $data['city'] ?? null,
            region: $data['regionName'] ?? null,
            country: $data['countryCode'] ?? null,
            countryName: $data['country'] ?? null,
            latitude: $data['lat'] ?? null,
            longitude: $data['lon'] ?? null,
            timezone: $data['timezone'] ?? null,
            isp: $data['isp'] ?? null,
        );
    }
}
