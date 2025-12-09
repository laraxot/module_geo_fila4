<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> be08416 (.)
use Modules\Geo\Models\Place;

/**
 * Action per aggiornare le coordinate di un luogo.
 */
readonly class UpdateCoordinatesAction
{
    public function __construct(
<<<<<<< HEAD
        private GetCoordinatesAction $getCoordinates,
    ) {
    }
=======
        private  GetCoordinatesAction $getCoordinates,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Aggiorna le coordinate di un luogo usando il suo indirizzo.
     *
<<<<<<< HEAD
     * @throws \RuntimeException Se non è possibile ottenere le coordinate
     */
    public function execute(Place $place): void
    {
        if (! $place->address || ! is_string($place->address->formatted_address)) {
            throw new \RuntimeException('Place address is required');
=======
     * @throws RuntimeException Se non è possibile ottenere le coordinate
     */
    public function execute(Place $place): void
    {
        if (!$place->address || !is_string($place->address->formatted_address)) {
            throw new RuntimeException('Place address is required');
>>>>>>> be08416 (.)
        }

        $location = $this->getCoordinates->execute($place->address->formatted_address);

<<<<<<< HEAD
        if (! $location) {
            throw new \RuntimeException('Could not get coordinates for address: '.$place->address->formatted_address);
=======
        if (!$location) {
            throw new RuntimeException('Could not get coordinates for address: ' . $place->address->formatted_address);
>>>>>>> be08416 (.)
        }

        $place->update([
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
        ]);
    }
}
