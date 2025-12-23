<?php

declare(strict_types=1);

namespace Modules\Geo\Datas\Photon;

use Modules\Geo\Datas\Map\PositionData;
use Spatie\LaravelData\Data;

class PhotonFeatureData extends Data
{
    public function __construct(
        public PositionData $geometry,
        public PhotonPropertiesData $properties,
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
