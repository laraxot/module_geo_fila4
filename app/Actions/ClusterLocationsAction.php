<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\InvalidLocationException;

readonly class ClusterLocationsAction
{
    public function __construct(
<<<<<<< HEAD
        private CalculateDistanceAction $distanceCalculator,
    ) {
    }
=======
        private  CalculateDistanceAction $distanceCalculator,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Raggruppa le posizioni in cluster basati sulla distanza.
     *
<<<<<<< HEAD
     * @param array<LocationData> $locations   Lista delle posizioni da raggruppare
     * @param float               $maxDistance Distanza massima in km tra i punti di un cluster
     *
     * @throws InvalidLocationException Se i dati della posizione non sono validi
     *
     * @return array<array{center: LocationData, points: array<LocationData>}>
=======
     * @param  array<LocationData>  $locations  Lista delle posizioni da raggruppare
     * @param  float  $maxDistance  Distanza massima in km tra i punti di un cluster
     * @return array<array{center: LocationData, points: array<LocationData>}>
     *
     * @throws InvalidLocationException Se i dati della posizione non sono validi
>>>>>>> be08416 (.)
     */
    public function execute(array $locations, float $maxDistance = 1.0): array
    {
        $clusters = [];

        foreach ($locations as $location) {
<<<<<<< HEAD
            if (! ($location instanceof LocationData)) {
=======
            if (!($location instanceof LocationData)) {
>>>>>>> be08416 (.)
                throw InvalidLocationException::invalidData();
            }

            $assigned = false;

            foreach ($clusters as &$cluster) {
                $distance = $this->distanceCalculator->execute($cluster['center'], $location);
                $distanceKm = ((float) $distance['distance']['value']) / 1000;

                if ($distanceKm <= $maxDistance) {
                    $cluster['points'][] = $location;
                    $this->updateClusterCenter($cluster);
                    $assigned = true;
                    break;
                }
            }

<<<<<<< HEAD
            if (! $assigned) {
=======
            if (!$assigned) {
>>>>>>> be08416 (.)
                $clusters[] = [
                    'center' => $location,
                    'points' => [$location],
                ];
            }
        }

        return $clusters;
    }

    /**
     * Aggiorna il centro del cluster calcolando la media delle coordinate.
     *
<<<<<<< HEAD
     * @param array{center: LocationData, points: array<LocationData>} $cluster
     */
    private function updateClusterCenter(array &$cluster): void
    {
        $latSum = array_sum(array_map(fn (LocationData $point) => $point->latitude, $cluster['points']));

        $lonSum = array_sum(array_map(fn (LocationData $point) => $point->longitude, $cluster['points']));
=======
     * @param  array{center: LocationData, points: array<LocationData>}  $cluster
     */
    private function updateClusterCenter(array &$cluster): void
    {
        $latSum = array_sum(array_map(fn(LocationData $point) => $point->latitude, $cluster['points']));

        $lonSum = array_sum(array_map(fn(LocationData $point) => $point->longitude, $cluster['points']));
>>>>>>> be08416 (.)

        $count = count($cluster['points']);

        $cluster['center'] = new LocationData(
            latitude: $latSum / $count,
            longitude: $lonSum / $count,
        );
    }
}
