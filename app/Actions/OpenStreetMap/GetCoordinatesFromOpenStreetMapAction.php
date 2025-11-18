<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\OpenStreetMap;

use Modules\Geo\Actions\Nominatim\FetchCoordinatesAction;
use Modules\Geo\Datas\LocationData;

/**
 * Classe per ottenere le coordinate da OpenStreetMap.
 */
readonly class GetCoordinatesFromOpenStreetMapAction
{
    public function __construct(
        private FetchCoordinatesAction $fetchCoordinatesAction,
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)

    /**
     * Ottiene le coordinate geografiche da un indirizzo usando OpenStreetMap.
     *
<<<<<<< HEAD
     * @param string $address Indirizzo da geocodificare
     *
=======
     * @param  string  $address  Indirizzo da geocodificare
>>>>>>> 1bb689f (.)
     * @return LocationData|null Dati della posizione o null se non trovata
     */
    public function execute(string $address): ?LocationData
    {
        if (empty($address)) {
            return null;
        }

        return $this->fetchCoordinatesAction->execute($address);
    }
}
