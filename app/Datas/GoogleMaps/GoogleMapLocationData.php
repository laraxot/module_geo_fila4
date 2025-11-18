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
     * @param float $lat Latitudine
     * @param float $lng Longitudine
=======
     * @param  float  $lat  Latitudine
     * @param  float  $lng  Longitudine
>>>>>>> 1bb689f (.)
     */
    public function __construct(
        public readonly float $lat,
        public readonly float $lng,
<<<<<<< HEAD
    ) {
    }
=======
    ) {}
>>>>>>> 1bb689f (.)
}
