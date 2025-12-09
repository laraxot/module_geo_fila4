<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

class ValidateCoordinatesAction
{
    public function execute(float $latitude, float $longitude): bool
    {
<<<<<<< HEAD
        return $this->isValidLatitude($latitude) && $this->isValidLongitude($longitude);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->isValidLatitude($latitude) && $this->isValidLongitude($longitude);
=======
        return $this->isValidLatitude($latitude)
               && $this->isValidLongitude($longitude);
>>>>>>> a12f125f4a (.)
=======
        return $this->isValidLatitude($latitude) && $this->isValidLongitude($longitude);
>>>>>>> b93ef594b4 (.)
=======
        return $this->isValidLatitude($latitude)
               && $this->isValidLongitude($longitude);
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    }

    private function isValidLatitude(float $latitude): bool
    {
        return $latitude >= -90 && $latitude <= 90;
    }

    private function isValidLongitude(float $longitude): bool
    {
        return $longitude >= -180 && $longitude <= 180;
    }
}
