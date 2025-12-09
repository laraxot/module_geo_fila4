<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Modules\Geo\Datas\LocationData;

/**
 * Action per filtrare le coordinate geografiche all'interno di un raggio specificato.
 *
 * Questa action prende un punto centrale (latitudine e longitudine) e un array di coordinate,
 * e restituisce solo le coordinate che si trovano entro il raggio specificato dal punto centrale.
 *
<<<<<<< HEAD
 * @param float                                             $centerLatitude  La latitudine del punto centrale
 * @param float                                             $centerLongitude La longitudine del punto centrale
 * @param array<array{latitude: string, longitude: string}> $coordinates     Array di coordinate da filtrare
 * @param int                                               $radius          Raggio in metri entro cui filtrare le coordinate
 *
=======
 * @param  float  $centerLatitude  La latitudine del punto centrale
 * @param  float  $centerLongitude  La longitudine del punto centrale
 * @param  array<array{latitude: string, longitude: string}>  $coordinates  Array di coordinate da filtrare
 * @param  int  $radius  Raggio in metri entro cui filtrare le coordinate
>>>>>>> be08416 (.)
 * @return array<array{latitude: string, longitude: string}> Le coordinate filtrate
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
readonly class FilterCoordinatesInRadiusAction
{
    public function __construct(
<<<<<<< HEAD
        private CalculateDistanceAction $calculateDistanceAction,
    ) {
    }

    /**
     * @param array<array{latitude: string, longitude: string}> $coordinates
     *
=======
        private  CalculateDistanceAction $calculateDistanceAction,
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
class FilterCoordinatesInRadiusAction
{
    public function __construct(
        private readonly CalculateDistanceAction $calculateDistanceAction,
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
readonly class FilterCoordinatesInRadiusAction
{
    public function __construct(
        private  CalculateDistanceAction $calculateDistanceAction,
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    ) {}

    /**
     * @param  array<array{latitude: string, longitude: string}>  $coordinates
>>>>>>> be08416 (.)
     * @return array<array{latitude: string, longitude: string}>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
    public function execute(float $centerLatitude, float $centerLongitude, array $coordinates, int $radius): array
    {
        $centerLocation = new LocationData(
            latitude: $centerLatitude,
            longitude: $centerLongitude,
            address: null,
        );

        return array_filter($coordinates, function (array $coordinate) use ($centerLocation, $radius): bool {
            $targetLocation = new LocationData(
                latitude: (float) $coordinate['latitude'],
                longitude: (float) $coordinate['longitude'],
                address: null,
            );

            $distance = $this->calculateDistanceAction->execute($centerLocation, $targetLocation)['distance']['value'];

            return $distance <= $radius;
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    public function execute(
        float $centerLatitude,
        float $centerLongitude,
        array $coordinates,
        int $radius,
    ): array {
<<<<<<< HEAD
=======
    public function execute(float $centerLatitude, float $centerLongitude, array $coordinates, int $radius): array
    {
>>>>>>> b93ef594b4 (.)
        $centerLocation = new LocationData(
            latitude: $centerLatitude,
            longitude: $centerLongitude,
            address: null,
        );

        return array_filter($coordinates, function (array $coordinate) use ($centerLocation, $radius): bool {
            $targetLocation = new LocationData(
                latitude: (float) $coordinate['latitude'],
                longitude: (float) $coordinate['longitude'],
                address: null,
            );

            $distance = $this->calculateDistanceAction->execute($centerLocation, $targetLocation)['distance']['value'];

<<<<<<< HEAD
                return $distance <= $radius;
            }
        );
>>>>>>> a12f125f4a (.)
=======
            return $distance <= $radius;
        });
>>>>>>> b93ef594b4 (.)
=======
        $centerLocation = new LocationData(
            latitude: $centerLatitude,
            longitude: $centerLongitude,
            address: null
        );

        return array_filter(
            $coordinates,
            function (array $coordinate) use ($centerLocation, $radius): bool {
                $targetLocation = new LocationData(
                    latitude: (float) $coordinate['latitude'],
                    longitude: (float) $coordinate['longitude'],
                    address: null
                );

                $distance = $this->calculateDistanceAction->execute($centerLocation, $targetLocation)['distance']['value'];

                return $distance <= $radius;
            }
        );
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    }
}
