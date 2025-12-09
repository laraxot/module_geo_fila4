<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\TimeZone;

<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> be08416 (.)
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Modules\Geo\Datas\TimeZoneData;

use function Safe\json_decode;

/**
 * Action per ottenere il fuso orario da coordinate geografiche.
 */
class GetTimeZoneAction
{
    private const API_URL = 'https://maps.googleapis.com/maps/api/timezone/json';

    private Client $client;

<<<<<<< HEAD
    private ?string $apiKey;

    public function __construct(?string $apiKey = null)
=======
    private null|string $apiKey;

    public function __construct(null|string $apiKey = null)
>>>>>>> be08416 (.)
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    /**
     * @throws GuzzleException
     */
    public function execute(float $latitude, float $longitude): TimeZoneData
    {
        $response = $this->client->get(self::API_URL, [
            'query' => [
<<<<<<< HEAD
                'location' => $latitude.','.$longitude,
=======
                'location' => $latitude . ',' . $longitude,
>>>>>>> be08416 (.)
                'timestamp' => time(),
                'key' => $this->apiKey,
            ],
        ]);

        /** @var array{status: string, timeZoneId: string, timeZoneName: string, rawOffset: int, dstOffset: int, countryCode?: string} $data */
        $data = json_decode($response->getBody()->getContents(), true);

        if ('OK' !== $data['status']) {
<<<<<<< HEAD
            throw new \RuntimeException('Failed to get timezone: '.($data['errorMessage'] ?? $data['status']));
=======
            throw new RuntimeException('Failed to get timezone: ' . ($data['errorMessage'] ?? $data['status']));
>>>>>>> be08416 (.)
        }

        return new TimeZoneData(
            timeZoneId: $data['timeZoneId'],
            timeZoneName: $data['timeZoneName'],
            rawOffset: $data['rawOffset'],
            dstOffset: $data['dstOffset'],
            countryCode: $data['countryCode'] ?? '',
        );
    }
}
