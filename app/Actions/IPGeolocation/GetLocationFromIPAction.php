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
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)

    /**
     * Ottiene i dati di geolocalizzazione per un indirizzo IP.
     *
<<<<<<< HEAD
     * @param string $ip Indirizzo IP
     *
=======
     * @param  string  $ip  Indirizzo IP
>>>>>>> 1bb689f (.)
     * @return IPLocationData|null Dati di geolocalizzazione o null se non disponibili
     */
    public function execute(string $ip): ?IPLocationData
    {
        return $this->fetchIPLocationAction->execute($ip);
    }
}
