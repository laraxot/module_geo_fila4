<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Geo\Models\PlaceType;

/**
<<<<<<< HEAD
 * PlaceType Factory.
=======
 * PlaceType Factory
>>>>>>> be08416 (.)
 *
 * Factory for creating PlaceType model instances for testing and seeding.
 *
 * @extends Factory<PlaceType>
 */
class PlaceTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<PlaceType>
     */
    protected $model = PlaceType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $placeTypes = [
            'Ospedale' => 'Struttura ospedaliera per cure mediche',
            'Clinica' => 'Clinica privata per visite specialistiche',
            'Studio Medico' => 'Studio privato di medici specialisti',
            'Farmacia' => 'Farmacia per la vendita di medicinali',
            'Laboratorio' => 'Laboratorio di analisi mediche',
            'Centro Diagnostico' => 'Centro per diagnostica medica',
            'Poliambulatorio' => 'Struttura con più specialità mediche',
            'Casa di Cura' => 'Casa di cura privata',
        ];

        $name = $this->faker->randomElement(array_keys($placeTypes));

        return [
            'name' => $name,
            'description' => is_string($name) && isset($placeTypes[$name]) ? $placeTypes[$name] : 'Default description',
        ];
    }

    /**
     * Create place type for hospital.
<<<<<<< HEAD
     */
    public function hospital(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function hospital(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'name' => 'Ospedale',
            'description' => 'Struttura ospedaliera per cure mediche acute e croniche',
        ]);
    }

    /**
     * Create place type for clinic.
<<<<<<< HEAD
     */
    public function clinic(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function clinic(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'name' => 'Clinica',
            'description' => 'Clinica privata per visite specialistiche e trattamenti',
        ]);
    }

    /**
     * Create place type for medical office.
<<<<<<< HEAD
     */
    public function medicalOffice(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function medicalOffice(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'name' => 'Studio Medico',
            'description' => 'Studio privato di medici specialisti',
        ]);
    }

    /**
     * Create place type for pharmacy.
<<<<<<< HEAD
     */
    public function pharmacy(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function pharmacy(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'name' => 'Farmacia',
            'description' => 'Farmacia per la vendita di medicinali e prodotti sanitari',
        ]);
    }

    /**
     * Create place type for laboratory.
<<<<<<< HEAD
     */
    public function laboratory(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function laboratory(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> be08416 (.)
            'name' => 'Laboratorio',
            'description' => 'Laboratorio di analisi mediche e diagnostiche',
        ]);
    }
}
