<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Geo\Models\GeoNamesCap;
=======
>>>>>>> 078f9da (.)

class GeoNamesCapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = GeoNamesCap::class;
=======
    protected $model = \Modules\Geo\Models\GeoNamesCap::class;
>>>>>>> 078f9da (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
