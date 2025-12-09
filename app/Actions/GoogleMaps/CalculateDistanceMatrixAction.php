<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\GoogleMaps;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\GoogleMaps\GoogleMapsApiException;

/**
 * Classe per calcolare la matrice delle distanze tra punti usando Google Maps.
 */
class CalculateDistanceMatrixAction
{
    private const BASE_URL = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    /**
     * Calcola la matrice delle distanze tra origini e destinazioni.
     *
     * @param Collection<int, LocationData> $origins      Punti di origine
     * @param Collection<int, LocationData> $destinations Punti di destinazione
     *
     * @throws GoogleMapsApiException Se la richiesta fallisce o i dati non sono validi
     *
     * @return array<array<array{
     *     distance: array{text: string, value: int},
     *     duration: array{text: string, value: int},
     *     status: string
     * }>>
     */
    public function execute(Collection $origins, Collection $destinations): array
    {
        $apiKey = $this->getApiKey();

        $response = Http::get(self::BASE_URL, [
            'origins' => $origins
<<<<<<< HEAD
                ->map(fn (LocationData $location): string => sprintf('%f,%f', $location->latitude, $location->longitude))
                ->join('|'),
            'destinations' => $destinations
                ->map(fn (LocationData $location): string => sprintf('%f,%f', $location->latitude, $location->longitude))
=======
                ->map(fn(LocationData $location): string => sprintf('%f,%f', $location->latitude, $location->longitude))
                ->join('|'),
            'destinations' => $destinations
                ->map(fn(LocationData $location): string => sprintf('%f,%f', $location->latitude, $location->longitude))
>>>>>>> be08416 (.)
                ->join('|'),
            'key' => $apiKey,
        ]);

<<<<<<< HEAD
        if (! $response->successful()) {
=======
        if (!$response->successful()) {
>>>>>>> be08416 (.)
            throw GoogleMapsApiException::requestFailed((string) $response->status());
        }

        /** @var array{status?: string, rows?: array<int, array{elements?: array<int, array{distance?: array{text: string, value: int}, duration?: array{text: string, value: int}, status?: string}>}>} $data */
        $data = $response->json();

<<<<<<< HEAD
        if (! is_array($data) || ($data['status'] ?? null) !== 'OK') {
            throw GoogleMapsApiException::requestFailed('Stato della risposta non valido: '.($data['status'] ?? 'sconosciuto'));
=======
        if (!is_array($data) || 'OK' !== ($data['status'] ?? null)) {
            throw GoogleMapsApiException::requestFailed(
                'Stato della risposta non valido: ' . ($data['status'] ?? 'sconosciuto'),
            );
>>>>>>> be08416 (.)
        }

        if (empty($data['rows'])) {
            throw GoogleMapsApiException::noResultsFound();
        }

<<<<<<< HEAD
        return array_map(fn (array $row): array => array_map(fn (array $element): array => [
=======
        return array_map(fn(array $row): array => array_map(fn(array $element): array => [
>>>>>>> be08416 (.)
            'distance' => $element['distance'] ?? ['text' => '0 km', 'value' => 0],
            'duration' => $element['duration'] ?? ['text' => '0 min', 'value' => 0],
            'status' => $element['status'] ?? 'ZERO_RESULTS',
        ], $row['elements'] ?? []), $data['rows'] ?? []);
    }

    private function getApiKey(): string
    {
        $apiKey = config('services.google.maps_api_key');

<<<<<<< HEAD
        if (empty($apiKey) || ! is_string($apiKey)) {
=======
        if (empty($apiKey) || !is_string($apiKey)) {
>>>>>>> be08416 (.)
            throw GoogleMapsApiException::missingApiKey();
        }

        return $apiKey;
    }
}
