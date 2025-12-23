<?php

declare(strict_types=1);

namespace Modules\Geo\Actions\IPGeolocation;

use Modules\Geo\Datas\IPLocationData;

/**
 * Classe per ottenere la posizione da un indirizzo IP.
 */
readonly class GetLocationFromIPAction
{
    public function __construct(
        private FetchIPLocationAction $fetchIPLocationAction,
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
     * Ottiene i dati di geolocalizzazione per un indirizzo IP.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $ip Indirizzo IP
     *
=======
     * @param  string  $ip  Indirizzo IP
>>>>>>> 1bb689f (.)
=======
     * @param string $ip Indirizzo IP
     *
>>>>>>> 0746367 (.)
     * @return IPLocationData|null Dati di geolocalizzazione o null se non disponibili
     */
    public function execute(string $ip): ?IPLocationData
    {
        return $this->fetchIPLocationAction->execute($ip);
    }
}
