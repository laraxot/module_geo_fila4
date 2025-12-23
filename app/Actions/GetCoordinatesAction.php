<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
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
=======
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\LocationData;
>>>>>>> 0746367 (.)

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
<<<<<<< HEAD
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
=======
     * @throws RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> 1bb689f (.)
=======
     * @throws \RuntimeException Se la richiesta fallisce o la risposta non è valida
>>>>>>> 0746367 (.)
     */
    public function execute(string $formattedAddress): ?LocationData
    {
        $apiKey = config('services.google.maps.key');
        if (! $apiKey) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \RuntimeException('Google Maps API key not found');
=======
            throw new RuntimeException('Google Maps API key not found');
>>>>>>> 1bb689f (.)
=======
            throw new \RuntimeException('Google Maps API key not found');
>>>>>>> 0746367 (.)
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $formattedAddress,
            'key' => $apiKey,
        ]);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
        // Handle PromiseInterface|Response union type
        if ($response instanceof PromiseInterface) {
            $response = $response->wait();
        }

        /** @var Response $response */
<<<<<<< HEAD
        if (! $response->successful()) {
            throw new \RuntimeException('Failed to get coordinates from Google Maps API');
=======
        if (! $response->successful()) {
            throw new RuntimeException('Failed to get coordinates from Google Maps API');
>>>>>>> 1bb689f (.)
=======
        if (! $response->successful()) {
            throw new \RuntimeException('Failed to get coordinates from Google Maps API');
>>>>>>> 0746367 (.)
        }

        /** @var array{status: string, results: array<int, array{geometry: array{location: array{lat: float, lng: float}}}>} $data */
        $data = json_decode($response->body(), true);

<<<<<<< HEAD
<<<<<<< HEAD
        if ('OK' !== $data['status'] || empty($data['results'])) {
=======
        if ($data['status'] !== 'OK' || empty($data['results'])) {
>>>>>>> 1bb689f (.)
=======
        if ('OK' !== $data['status'] || empty($data['results'])) {
>>>>>>> 0746367 (.)
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
