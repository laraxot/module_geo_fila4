<?php

declare(strict_types=1);

namespace Modules\Geo\Datas\GoogleMaps;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Data Transfer Object per le risposte dell'API di Google Maps.
 */
class GoogleMapResponseData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param DataCollection<GoogleMapResultData> $results Risultati della geocodifica
     * @param string                              $status  Stato della risposta
=======
     * @param  DataCollection<GoogleMapResultData>  $results  Risultati della geocodifica
     * @param  string  $status  Stato della risposta
>>>>>>> 1bb689f (.)
=======
     * @param DataCollection<GoogleMapResultData> $results Risultati della geocodifica
     * @param string                              $status  Stato della risposta
>>>>>>> 0746367 (.)
     */
    public function __construct(
        public readonly DataCollection $results,
        public readonly string $status,
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
}
