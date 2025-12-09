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
<<<<<<< HEAD
        private FetchCoordinatesAction $fetchCoordinatesAction,
    ) {
    }
=======
        private  FetchCoordinatesAction $fetchCoordinatesAction,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Ottiene le coordinate geografiche da un indirizzo usando OpenStreetMap.
     *
     * @param string $address Indirizzo da geocodificare
     *
     * @return LocationData|null Dati della posizione o null se non trovata
     */
<<<<<<< HEAD
    public function execute(string $address): ?LocationData
=======
    public function execute(string $address): null|LocationData
>>>>>>> be08416 (.)
    {
        if (empty($address)) {
            return null;
        }

        return $this->fetchCoordinatesAction->execute($address);
    }
}
