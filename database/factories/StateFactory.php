<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Geo\Models\State;

/**
 * <<<<<<< HEAD
 * <<<<<<< HEAD
 * State Factory.
 * =======
 * State Factory
 * >>>>>>> 1bb689f (.)
 * =======
 * State Factory.
 * >>>>>>> 0746367 (.).
 *
 * @extends Factory<State>
 */
class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        $italianRegions = [
            'Lazio' => 'LAZ',
            'Lombardia' => 'LOM',
            'Campania' => 'CAM',
            'Sicilia' => 'SIC',
            'Veneto' => 'VEN',
            'Piemonte' => 'PIE',
            'Emilia-Romagna' => 'EMR',
            'Toscana' => 'TOS',
            'Puglia' => 'PUG',
            'Calabria' => 'CAL',
        ];

        $state = $this->faker->randomElement(array_keys($italianRegions));

        return [
            'state' => $state,
            'state_code' => is_string($state) && isset($italianRegions[$state]) ? $italianRegions[$state] : 'XX',
        ];
    }

    public function lombardia(): static
    {
        return $this->state(fn (array $_attributes): array => [
            'state' => 'Lombardia',
            'state_code' => 'LOM',
        ]);
    }

    public function lazio(): static
    {
        return $this->state(fn (array $_attributes): array => [
            'state' => 'Lazio',
            'state_code' => 'LAZ',
        ]);
    }
}
