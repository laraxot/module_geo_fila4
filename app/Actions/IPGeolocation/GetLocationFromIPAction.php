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
<<<<<<< HEAD
        private FetchIPLocationAction $fetchIPLocationAction,
    ) {
    }
=======
        private  FetchIPLocationAction $fetchIPLocationAction,
    ) {}
>>>>>>> be08416 (.)

    /**
     * Ottiene i dati di geolocalizzazione per un indirizzo IP.
     *
     * @param string $ip Indirizzo IP
     *
     * @return IPLocationData|null Dati di geolocalizzazione o null se non disponibili
     */
<<<<<<< HEAD
    public function execute(string $ip): ?IPLocationData
=======
    public function execute(string $ip): null|IPLocationData
>>>>>>> be08416 (.)
    {
        return $this->fetchIPLocationAction->execute($ip);
    }
}
