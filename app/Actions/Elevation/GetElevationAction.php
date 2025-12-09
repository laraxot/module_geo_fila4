<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\Elevation;

<<<<<<< HEAD
=======
use Throwable;
use InvalidArgumentException;
>>>>>>> be08416 (.)
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\ElevationException;
use Modules\Geo\Services\GoogleMapsService;

/**
 * Classe per ottenere l'elevazione di un punto geografico.
 *
 * Questa classe utilizza il servizio Google Maps Elevation per ottenere:
 * - L'elevazione in metri sul livello del mare
 * - La risoluzione dell'elevazione
 *
 * @see https://developers.google.com/maps/documentation/elevation
 */
readonly class GetElevationAction
{
    /**
     * @param GoogleMapsService $googleMapsService Servizio per le richieste a Google Maps
     */
    public function __construct(
<<<<<<< HEAD
        private GoogleMapsService $googleMapsService,
    ) {
    }
=======
        private  GoogleMapsService $googleMapsService,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Ottiene l'elevazione per una posizione geografica.
     *
     * @param LocationData $location La posizione di cui ottenere l'elevazione
     *
     * @throws ElevationException        Se il recupero dell'elevazione fallisce
<<<<<<< HEAD
     * @throws \InvalidArgumentException Se le coordinate non sono valide
=======
     * @throws InvalidArgumentException Se le coordinate non sono valide
>>>>>>> be08416 (.)
     *
     * @return float L'elevazione in metri sul livello del mare
     */
    public function execute(LocationData $location): float
    {
        $this->validateCoordinates($location);

        try {
            /** @var array<string, mixed> $response */
            $response = $this->googleMapsService->getElevation($location->latitude, $location->longitude);

<<<<<<< HEAD
            if (! isset($response['results']) || ! is_array($response['results']) || empty($response['results'])) {
=======
            if (!isset($response['results']) || !is_array($response['results']) || empty($response['results'])) {
>>>>>>> be08416 (.)
                throw ElevationException::invalidResponse();
            }

            $firstResult = $response['results'][0] ?? null;
<<<<<<< HEAD
            if (! is_array($firstResult) || ! isset($firstResult['elevation'])) {
=======
            if (!is_array($firstResult) || !isset($firstResult['elevation'])) {
>>>>>>> be08416 (.)
                throw ElevationException::invalidResponse();
            }

            return (float) $firstResult['elevation'];
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (Throwable $e) {
>>>>>>> be08416 (.)
            if ($e instanceof ElevationException) {
                throw $e;
            }

<<<<<<< HEAD
            throw ElevationException::serviceError('Errore nel recupero dell\'elevazione: '.$e->getMessage(), $e);
=======
            throw ElevationException::serviceError('Errore nel recupero dell\'elevazione: ' . $e->getMessage(), $e);
>>>>>>> be08416 (.)
        }
    }

    /**
     * Formatta l'elevazione in una stringa leggibile.
     *
     * @param float $meters Elevazione in metri
     *
     * @return string Elevazione formattata con unità di misura
     */
    public function formatElevation(float $meters): string
    {
        return sprintf('%.1f m s.l.m.', $meters);
    }

    /**
     * Valida le coordinate di una posizione.
     *
     * @param LocationData $location Posizione da validare
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException Se le coordinate non sono valide
=======
     * @throws InvalidArgumentException Se le coordinate non sono valide
>>>>>>> be08416 (.)
     */
    private function validateCoordinates(LocationData $location): void
    {
        if ($location->latitude < -90 || $location->latitude > 90) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Latitudine non valida: %f', $location->latitude));
        }

        if ($location->longitude < -180 || $location->longitude > 180) {
            throw new \InvalidArgumentException(sprintf('Longitudine non valida: %f', $location->longitude));
=======
            throw new InvalidArgumentException(sprintf('Latitudine non valida: %f', $location->latitude));
        }

        if ($location->longitude < -180 || $location->longitude > 180) {
            throw new InvalidArgumentException(sprintf('Longitudine non valida: %f', $location->longitude));
>>>>>>> be08416 (.)
        }
    }
}
