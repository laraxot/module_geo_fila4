<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\LocationData;
=======
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\LocationData;
use RuntimeException;
>>>>>>> 1bb689f (.)

use function Safe\json_decode;

/**
 * Action per ottenere le coordinate geografiche da un indirizzo usando Google Maps Geocoding API.
 */
class GetCoordinatesAction
{
    /**
     * Ottiene le coordinate geografiche da un indirizzo.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
=======
     * @throws RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> 1bb689f (.)
     */
    public function execute(string $formattedAddress): ?LocationData
    {
        $apiKey = config('services.google.maps.key');
        if (! $apiKey) {
<<<<<<< HEAD
            throw new \RuntimeException('Google Maps API key not found');
=======
            throw new RuntimeException('Google Maps API key not found');
>>>>>>> 1bb689f (.)
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $formattedAddress,
            'key' => $apiKey,
        ]);

<<<<<<< HEAD
        // Handle PromiseInterface|Response union type
        if ($response instanceof PromiseInterface) {
            $response = $response->wait();
        }

        /** @var Response $response */
        if (! $response->successful()) {
            throw new \RuntimeException('Failed to get coordinates from Google Maps API');
=======
        if (! $response->successful()) {
            throw new RuntimeException('Failed to get coordinates from Google Maps API');
>>>>>>> 1bb689f (.)
        }

        /** @var array{status: string, results: array<int, array{geometry: array{location: array{lat: float, lng: float}}}>} $data */
        $data = json_decode($response->body(), true);

<<<<<<< HEAD
        if ('OK' !== $data['status'] || empty($data['results'])) {
=======
        if ($data['status'] !== 'OK' || empty($data['results'])) {
>>>>>>> 1bb689f (.)
            return null;
        }

        $location = $data['results'][0]['geometry']['location'];

        return new LocationData(
            latitude: (float) $location['lat'],
            longitude: (float) $location['lng'],
            address: $formattedAddress,
        );
    }
}
