<?php

declare(strict_types=1);

namespace Modules\Geo\Datas\GoogleMaps;

use Spatie\LaravelData\Data;

/**
 * Data Transfer Object per i dati di posizione dell'API di Google Maps.
 */
class GoogleMapLocationData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param float $lat Latitudine
     * @param float $lng Longitudine
=======
     * @param  float  $lat  Latitudine
     * @param  float  $lng  Longitudine
>>>>>>> 1bb689f (.)
=======
     * @param float $lat Latitudine
     * @param float $lng Longitudine
>>>>>>> 0746367 (.)
     */
    public function __construct(
        public readonly float $lat,
        public readonly float $lng,
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
