<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> be08416 (.)
use Modules\Geo\Traits\HandlesCoordinates;

/**
 * Action per filtrare le coordinate in base alla distanza da un punto.
 */
class FilterCoordinatesAction
{
    use HandlesCoordinates;

    /**
     * Filtra le coordinate che si trovano entro un certo raggio da un punto.
     *
<<<<<<< HEAD
     * @param array<array{latitude: float|string, longitude: float|string}> $coordinates Lista delle coordinate da filtrare
     * @param float                                                         $centerLat   Latitudine del punto centrale
     * @param float                                                         $centerLng   Longitudine del punto centrale
     * @param float                                                         $radiusKm    Raggio in chilometri
     *
     * @throws \InvalidArgumentException Se le coordinate non sono valide
     *
     * @return array<array{latitude: float, longitude: float, distance: float}> Coordinate filtrate con distanza
=======
     * @param  array<array{latitude: float|string, longitude: float|string}>  $coordinates  Lista delle coordinate da filtrare
     * @param  float  $centerLat  Latitudine del punto centrale
     * @param  float  $centerLng  Longitudine del punto centrale
     * @param  float  $radiusKm  Raggio in chilometri
     * @return array<array{latitude: float, longitude: float, distance: float}> Coordinate filtrate con distanza
     *
     * @throws InvalidArgumentException Se le coordinate non sono valide
>>>>>>> be08416 (.)
     */
    public function execute(array $coordinates, float $centerLat, float $centerLng, float $radiusKm): array
    {
        $this->validateInput($centerLat, $centerLng, $radiusKm);

        return collect($coordinates)
            ->map(function (array $coord) use ($centerLat, $centerLng): array {
                $lat = (float) $coord['latitude'];
                $lng = (float) $coord['longitude'];

                if ($lat < -90 || $lat > 90) {
                    throw new InvalidArgumentException('Latitudine non valida');
                }
                if ($lng < -180 || $lng > 180) {
                    throw new InvalidArgumentException('Longitudine non valida');
                }

                return [
                    'latitude' => $lat,
                    'longitude' => $lng,
                    'distance' => $this->calculateDistance($centerLat, $centerLng, $lat, $lng),
                ];
            })
<<<<<<< HEAD
            ->filter(fn (array $coord): bool => $coord['distance'] <= $radiusKm)
=======
            ->filter(fn(array $coord): bool => $coord['distance'] <= $radiusKm)
>>>>>>> be08416 (.)
            ->sortBy('distance')
            ->values()
            ->all();
    }

    /**
     * Valida i dati di input.
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException Se i dati non sono validi
=======
     * @throws InvalidArgumentException Se i dati non sono validi
>>>>>>> be08416 (.)
     */
    private function validateInput(float $latitude, float $longitude, float $radius): void
    {
        if ($latitude < -90 || $latitude > 90) {
            throw new InvalidArgumentException('Latitudine centrale non valida');
        }
        if ($longitude < -180 || $longitude > 180) {
            throw new InvalidArgumentException('Longitudine centrale non valida');
        }
        if ($radius <= 0) {
            throw new InvalidArgumentException('Il raggio deve essere maggiore di 0');
        }
        if ($radius >= 20000) {
            throw new InvalidArgumentException('Il raggio non può essere maggiore della circonferenza terrestre');
        }
    }
}
