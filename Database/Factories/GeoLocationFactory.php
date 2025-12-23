<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Geo\App\Models\GeoLocation;

/**
 * @extends Factory<GeoLocation>
 */
class GeoLocationFactory extends Factory
{
    protected $model = GeoLocation::class;

    public function definition(): array
    {
        $types = ['office', 'warehouse', 'shop', 'restaurant', 'hospital', 'school', 'park', 'station'];
        $type = (string) $this->faker->randomElement($types);

        // Coordinate per l'Italia (approssimative)
        $latitude = $this->faker->latitude(35.0, 47.0);
        $longitude = $this->faker->longitude(6.0, 19.0);

        return [
            'name' => $this->generateLocationName($type),
            'description' => $this->faker->sentence(),
            'type' => $type,
            'address' => $this->faker->streetAddress(),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'city' => $this->faker->city(),
            'country' => 'Italia',
            'postal_code' => $this->faker->postcode(),
            'is_active' => $this->faker->boolean(85),
        ];
    }

    private function generateLocationName(string $type): string
    {
        $prefixes = match ($type) {
            'office' => ['Ufficio', 'Sede', 'Studio', 'Agenzia'],
            'warehouse' => ['Magazzino', 'Deposito', 'Centro Logistico'],
            'shop' => ['Negozio', 'Boutique', 'Store', 'Emporio'],
            'restaurant' => ['Ristorante', 'Trattoria', 'Osteria', 'Pizzeria'],
            'hospital' => ['Ospedale', 'Clinica', 'Policlinico', 'Centro Medico'],
            'school' => ['Scuola', 'Istituto', 'Liceo', 'Università'],
            'park' => ['Parco', 'Giardino', 'Villa', 'Area Verde'],
            'station' => ['Stazione', 'Terminal', 'Fermata'],
            default => ['Luogo', 'Punto', 'Area']
        };

        $prefix = (string) $this->faker->randomElement($prefixes);
        $suffix = (string) $this->faker->randomElement([
            $this->faker->lastName(),
            $this->faker->streetName(),
            $this->faker->city(),
            $this->faker->word(),
        ]);

        return "{$prefix} {$suffix}";
    }

    public function office(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'office',
            'name' => $this->generateLocationName('office'),
        ]);
    }

    public function warehouse(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'warehouse',
            'name' => $this->generateLocationName('warehouse'),
        ]);
    }

    public function shop(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'shop',
            'name' => $this->generateLocationName('shop'),
        ]);
    }

    public function restaurant(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'restaurant',
            'name' => $this->generateLocationName('restaurant'),
        ]);
    }

    public function hospital(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'hospital',
            'name' => $this->generateLocationName('hospital'),
        ]);
    }

    public function school(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'school',
            'name' => $this->generateLocationName('school'),
        ]);
    }

    public function park(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'park',
            'name' => $this->generateLocationName('park'),
        ]);
    }

    public function station(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'station',
            'name' => $this->generateLocationName('station'),
        ]);
    }

    public function inCity(string $city): static
    {
        return $this->state(fn (array $attributes) => [
            'city' => $city,
        ]);
    }

    public function inCountry(string $country): static
    {
        return $this->state(fn (array $attributes) => [
            'country' => $country,
        ]);
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
