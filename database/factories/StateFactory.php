<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Geo\Models\State;

/**
<<<<<<< HEAD
 * State Factory.
=======
 * State Factory
>>>>>>> be08416 (.)
 *
 * @extends Factory<State>
 */
class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        $italianRegions = [
            'Abruzzo' => 'ABR',
            'Basilicata' => 'BAS',
            'Calabria' => 'CAL',
            'Campania' => 'CAM',
            'Emilia-Romagna' => 'EMR',
            'Friuli-Venezia Giulia' => 'FVG',
            'Lazio' => 'LAZ',
            'Liguria' => 'LIG',
            'Lombardia' => 'LOM',
            'Marche' => 'MAR',
            'Molise' => 'MOL',
            'Piemonte' => 'PIE',
            'Puglia' => 'PUG',
            'Sardegna' => 'SAR',
            'Sicilia' => 'SIC',
            'Toscana' => 'TOS',
            'Trentino-Alto Adige' => 'TAA',
            'Umbria' => 'UMB',
            "Valle d'Aosta" => 'VDA',
            'Veneto' => 'VEN',
        ];

        $state = $this->faker->randomElement(array_keys($italianRegions));

        return [
            'state' => $state,
            'state_code' => is_string($state) && isset($italianRegions[$state]) ? $italianRegions[$state] : 'XX',
        ];
    }

    public function lombardia(): static
    {
<<<<<<< HEAD
        return $this->state(fn (array $_attributes): array => [
=======
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'state' => 'Lombardia',
            'state_code' => 'LOM',
        ]);
    }

    public function lazio(): static
    {
<<<<<<< HEAD
        return $this->state(fn (array $_attributes): array => [
=======
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'state' => 'Lazio',
            'state_code' => 'LAZ',
        ]);
    }
}