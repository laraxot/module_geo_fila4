<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> be08416 (.)
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\LocationData;

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
     */
    public function execute(string $formattedAddress): ?LocationData
    {
        $apiKey = config('services.google.maps.key');
        if (! $apiKey) {
            throw new \RuntimeException('Google Maps API key not found');
=======
     * @throws RuntimeException Se la richiesta fallisce o la risposta non è valida
     */
    public function execute(string $formattedAddress): null|LocationData
    {
        $apiKey = config('services.google.maps.key');
        if (!$apiKey) {
            throw new RuntimeException('Google Maps API key not found');
>>>>>>> be08416 (.)
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $formattedAddress,
            'key' => $apiKey,
        ]);

<<<<<<< HEAD
        if (! $response->successful()) {
            throw new \RuntimeException('Failed to get coordinates from Google Maps API');
=======
        if (!$response->successful()) {
            throw new RuntimeException('Failed to get coordinates from Google Maps API');
>>>>>>> be08416 (.)
        }

        /** @var array{status: string, results: array<int, array{geometry: array{location: array{lat: float, lng: float}}}>} $data */
        $data = json_decode($response->body(), true);

        if ('OK' !== $data['status'] || empty($data['results'])) {
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
