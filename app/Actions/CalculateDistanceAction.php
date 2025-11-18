<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Support\Collection;
<<<<<<< HEAD
use Modules\Geo\Actions\GoogleMaps\CalculateDistanceMatrixAction;
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\DistanceCalculationException;
=======
use InvalidArgumentException;
use Modules\Geo\Actions\GoogleMaps\CalculateDistanceMatrixAction;
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\DistanceCalculationException;
use Throwable;
>>>>>>> 1bb689f (.)

/**
 * Classe per calcolare la distanza tra due punti geografici.
 *
 * Questa classe utilizza il servizio Google Maps Distance Matrix per calcolare:
 * - La distanza effettiva tra due punti considerando le strade
 * - Il tempo di percorrenza stimato
 * - Lo stato della richiesta
 *
 * @see https://developers.google.com/maps/documentation/distance-matrix
 */
readonly class CalculateDistanceAction
{
    /**
<<<<<<< HEAD
     * @param CalculateDistanceMatrixAction $distanceMatrixAction Servizio per il calcolo delle distanze
     */
    public function __construct(
        private CalculateDistanceMatrixAction $distanceMatrixAction,
    ) {
    }
=======
     * @param  CalculateDistanceMatrixAction  $distanceMatrixAction  Servizio per il calcolo delle distanze
     */
    public function __construct(
        private CalculateDistanceMatrixAction $distanceMatrixAction,
    ) {}
>>>>>>> 1bb689f (.)

    /**
     * Calcola la distanza e il tempo di percorrenza tra due punti.
     *
<<<<<<< HEAD
     * @param LocationData $origin      Punto di origine con coordinate valide
     * @param LocationData $destination Punto di destinazione con coordinate valide
     *
     * @throws DistanceCalculationException Se il calcolo della distanza fallisce o restituisce dati non validi
     * @throws \InvalidArgumentException    Se le coordinate non sono valide
     *
=======
     * @param  LocationData  $origin  Punto di origine con coordinate valide
     * @param  LocationData  $destination  Punto di destinazione con coordinate valide
>>>>>>> 1bb689f (.)
     * @return array{
     *     distance: array{text: string, value: int},
     *     duration: array{text: string, value: int},
     *     status: string
     * } Array con distanza, durata e stato
<<<<<<< HEAD
=======
     *
     * @throws DistanceCalculationException Se il calcolo della distanza fallisce o restituisce dati non validi
     * @throws InvalidArgumentException Se le coordinate non sono valide
>>>>>>> 1bb689f (.)
     */
    public function execute(LocationData $origin, LocationData $destination): array
    {
        $this->validateCoordinates($origin);
        $this->validateCoordinates($destination);

        try {
            $response = $this->distanceMatrixAction->execute(new Collection([$origin]), new Collection([$destination]));

            if (empty($response) || empty($response[0]) || empty($response[0][0])) {
                throw DistanceCalculationException::invalidResponse();
            }

            return $response[0][0];
<<<<<<< HEAD
        } catch (\Throwable $e) {
            throw DistanceCalculationException::calculationError('Errore nel calcolo della distanza: '.$e->getMessage(), $e);
=======
        } catch (Throwable $e) {
            throw DistanceCalculationException::calculationError(
                'Errore nel calcolo della distanza: '.$e->getMessage(),
                $e,
            );
>>>>>>> 1bb689f (.)
        }
    }

    /**
     * Formatta la distanza in metri in una stringa leggibile.
     *
<<<<<<< HEAD
     * @param int $meters Distanza in metri
     *
     * @throws \InvalidArgumentException Se il valore in metri è negativo
=======
     * @param  int  $meters  Distanza in metri
     *
     * @throws InvalidArgumentException Se il valore in metri è negativo
>>>>>>> 1bb689f (.)
     */
    public function formatDistance(int $meters): string
    {
        if ($meters < 0) {
<<<<<<< HEAD
            throw new \InvalidArgumentException('La distanza non può essere negativa');
=======
            throw new InvalidArgumentException('La distanza non può essere negativa');
>>>>>>> 1bb689f (.)
        }

        if ($meters < 1000) {
            return sprintf('%d m', $meters);
        }

        $kilometers = round($meters / 1000, 1);

        return sprintf('%.1f km', $kilometers);
    }

    /**
     * Valida le coordinate di una posizione.
     *
<<<<<<< HEAD
     * @param LocationData $location Posizione da validare
     *
     * @throws \InvalidArgumentException Se le coordinate non sono valide
=======
     * @param  LocationData  $location  Posizione da validare
     *
     * @throws InvalidArgumentException Se le coordinate non sono valide
>>>>>>> 1bb689f (.)
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
>>>>>>> 1bb689f (.)
        }
    }
}
