<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Support\Collection;
use Modules\Geo\Datas\LocationData;

/**
 * Action per ottimizzare l'ordine di un percorso minimizzando la distanza totale.
 */
readonly class OptimizeRouteAction
{
    public function __construct(
        private CalculateDistanceAction $calculateDistance,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)
=======
    ) {
    }
>>>>>>> 0746367 (.)

    /**
     * Ottimizza l'ordine dei punti minimizzando la distanza totale.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Collection<int, LocationData> $locations
     *
=======
     * @param  Collection<int, LocationData>  $locations
>>>>>>> 1bb689f (.)
=======
     * @param Collection<int, LocationData> $locations
     *
>>>>>>> 0746367 (.)
     * @return Collection<int, LocationData>
     */
    public function execute(Collection $locations): Collection
    {
        if ($locations->count() <= 2) {
            return $locations;
        }

        /** @var LocationData $firstLocation */
        $firstLocation = $locations->first();
        $optimizedLocations = collect([$firstLocation]);
        $remainingLocations = $locations->slice(1);

        while ($remainingLocations->isNotEmpty()) {
            /** @var LocationData $currentLocation */
            $currentLocation = $optimizedLocations->last();
            $nearestLocation = $this->findNearestLocation($currentLocation, $remainingLocations);

<<<<<<< HEAD
<<<<<<< HEAD
            if (null === $nearestLocation) {
=======
            if ($nearestLocation === null) {
>>>>>>> 1bb689f (.)
=======
            if (null === $nearestLocation) {
>>>>>>> 0746367 (.)
                break;
            }

            $optimizedLocations->push($nearestLocation);
            $remainingLocations = $remainingLocations->reject(
                fn (LocationData $location) => $location === $nearestLocation,
            );
        }

        return $optimizedLocations;
    }

    /**
     * Trova il punto più vicino a quello corrente.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Collection<int, LocationData> $locations
=======
     * @param  Collection<int, LocationData>  $locations
>>>>>>> 1bb689f (.)
=======
     * @param Collection<int, LocationData> $locations
>>>>>>> 0746367 (.)
     */
    private function findNearestLocation(LocationData $currentLocation, Collection $locations): ?LocationData
    {
        $nearestLocation = null;
        $shortestDistance = PHP_FLOAT_MAX;

        foreach ($locations as $location) {
            $distanceResult = $this->calculateDistance->execute(
                origin: $currentLocation,
                destination: $location,
            );

            // Estrai il valore numerico della distanza
            $distance = (float) ($distanceResult['distance']['value'] ?? PHP_FLOAT_MAX);

            if ($distance < $shortestDistance) {
                $shortestDistance = $distance;
                $nearestLocation = $location;
            }
        }

        return $nearestLocation;
    }
}
