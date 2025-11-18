<?php

declare(strict_types=1);

namespace Modules\Geo\Services;

use Modules\Geo\Exceptions\GoogleMaps\GoogleMapsApiException;
<<<<<<< HEAD
=======
use Override;
use Throwable;
>>>>>>> 1bb689f (.)

/**
 * Servizio per le interazioni con l'API di Google Maps.
 */
class GoogleMapsService extends BaseGeoService
{
    private const GEOCODING_URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    private const DISTANCE_MATRIX_URL = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    private const ELEVATION_URL = 'https://maps.googleapis.com/maps/api/elevation/json';

    /**
     * Esegue una richiesta di geocodifica inversa.
     *
<<<<<<< HEAD
     * @throws GoogleMapsApiException Se la richiesta fallisce
     *
     * @return array<string, mixed>
=======
     * @return array<string, mixed>
     *
     * @throws GoogleMapsApiException Se la richiesta fallisce
>>>>>>> 1bb689f (.)
     */
    public function reverseGeocode(float $latitude, float $longitude): array
    {
        try {
            return $this->makeRequest('GET', self::GEOCODING_URL, [
                'latlng' => "{$latitude},{$longitude}",
                'key' => $this->getApiKey(),
                'language' => 'it',
            ]);
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (Throwable $e) {
>>>>>>> 1bb689f (.)
            throw GoogleMapsApiException::requestFailed($e->getMessage());
        }
    }

    /**
     * Calcola la matrice delle distanze.
     *
<<<<<<< HEAD
     * @param array<string> $origins      Punti di origine (formato: "lat,lng|lat,lng|...")
     * @param array<string> $destinations Punti di destinazione (formato: "lat,lng|lat,lng|...")
     *
     * @throws GoogleMapsApiException Se la richiesta fallisce
     *
     * @return array<string, mixed>
=======
     * @param  array<string>  $origins  Punti di origine (formato: "lat,lng|lat,lng|...")
     * @param  array<string>  $destinations  Punti di destinazione (formato: "lat,lng|lat,lng|...")
     * @return array<string, mixed>
     *
     * @throws GoogleMapsApiException Se la richiesta fallisce
>>>>>>> 1bb689f (.)
     */
    public function getDistanceMatrix(array $origins, array $destinations): array
    {
        try {
            return $this->makeRequest('GET', self::DISTANCE_MATRIX_URL, [
                'origins' => implode('|', $origins),
                'destinations' => implode('|', $destinations),
                'key' => $this->getApiKey(),
                'language' => 'it',
                'units' => 'metric',
            ]);
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (Throwable $e) {
>>>>>>> 1bb689f (.)
            throw GoogleMapsApiException::requestFailed($e->getMessage());
        }
    }

    /**
     * Ottiene l'elevazione per un punto.
     *
<<<<<<< HEAD
     * @throws GoogleMapsApiException Se la richiesta fallisce
     *
     * @return array<string, mixed>
=======
     * @return array<string, mixed>
     *
     * @throws GoogleMapsApiException Se la richiesta fallisce
>>>>>>> 1bb689f (.)
     */
    public function getElevation(float $latitude, float $longitude): array
    {
        try {
            return $this->makeRequest('GET', self::ELEVATION_URL, [
                'locations' => "{$latitude},{$longitude}",
                'key' => $this->getApiKey(),
            ]);
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (Throwable $e) {
>>>>>>> 1bb689f (.)
            throw GoogleMapsApiException::requestFailed($e->getMessage());
        }
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 1bb689f (.)
    protected function getServiceName(): string
    {
        return 'google_maps';
    }
}
