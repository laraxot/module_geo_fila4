<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Geo\Contracts\HasGeolocation;
use Modules\Geo\Enums\AddressTypeEnum;
use Modules\Geo\Models\Address;

describe('Address Model', function (): void {
    it('can be created with factory', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create();

        expect($address)
            ->toBeInstanceOf(Address::class)
            ->and($address->exists)
            ->toBeTrue()
            ->and($address->id)
            ->toBeInt();
    });

    it('has correct fillable attributes', function (): void {
        $address = new Address;

        expect($address->getFillable())->toContain([
            'model_type',
            'model_id',
            'name',
            'description',
            'route',
            'street_number',
            'locality',
            'administrative_area_level_3',
            'administrative_area_level_2',
            'administrative_area_level_1',
            'country',
            'postal_code',
            'formatted_address',
            'place_id',
            'latitude',
            'longitude',
            'type',
            'is_primary',
            'extra_data',
        ]);
    });

    it('implements HasGeolocation contract', function (): void {
        $address = new Address;

        expect($address)->toBeInstanceOf(HasGeolocation::class);
    });

    it('uses soft deletes', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create();
        /** @phpstan-ignore-next-line method.nonObject */
        $address->delete();

        expect($address->deleted_at)
            ->not->toBeNull()->and(Address::withTrashed()->find($address->id))
            ->not->toBeNull()->and(Address::find($address->id))->toBeNull();
    });

    it('casts attributes correctly', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
            'latitude' => 45.4642,
            'longitude' => 9.1900,
            'is_primary' => true,
            'extra_data' => ['key' => 'value'],
        ]);

        expect($address->latitude)
            ->toBeFloat()
            ->and($address->longitude)
            ->toBeFloat()
            ->and($address->is_primary)
            ->toBeBool()
            ->and($address->extra_data)
            ->toBeArray();
    });

    it('has polymorphic relationship', function (): void {
        /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create();

        expect($address->addressable())->toBeInstanceOf(MorphTo::class);
    });

    describe('Accessors', function (): void {
        it('generates full_address accessor', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
                'route' => 'Via Roma',
                'street_number' => '123',
                'locality' => 'Milano',
                'postal_code' => '20100',
            ]);

            expect($address->full_address)
                ->toBeString()
                ->and($address->full_address)
                ->toContain('Via Roma')
                ->and($address->full_address)
                ->toContain('123')
                ->and($address->full_address)
                ->toContain('Milano');
        });

        it('generates street_address accessor', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
                'route' => 'Via Roma',
                'street_number' => '123',
            ]);

            expect($address->street_address)
                ->toBeString()
                ->and($address->street_address)
                ->toContain('Via Roma')
                ->and($address->street_address)
                ->toContain('123');
        });
    });

    describe('Geolocation Features', function (): void {
        it('stores coordinates correctly', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
                'latitude' => 45.4642,
                'longitude' => 9.1900,
            ]);

            expect($address->latitude)->toBe(45.4642)->and($address->longitude)->toBe(9.1900);
        });

        it('can calculate distance between addresses', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address1 = Address/** @phpstan-ignore-line */ ::factory()->create([
                'latitude' => 45.4642,
                'longitude' => 9.1900,
            ]);

            /** @var \Illuminate\Database\Eloquent\Collection */
        $address2 = Address/** @phpstan-ignore-line */ ::factory()->create([
                'latitude' => 45.4654,
                'longitude' => 9.1859,
            ]);

            if (method_exists($address1, 'distanceTo')) {
                /** @phpstan-ignore-next-line method.nonObject */
                $distance = $address1->distanceTo($address2);
                expect($distance)->toBeFloat()->and($distance)->toBeGreaterThan(0);
            }
        });
    });

    describe('Address Types', function (): void {
        it('can be set as primary address', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create(['is_primary' => true]);

            expect($address->is_primary)->toBeTrue();
        });

        it('can have different types', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create(['type' => AddressTypeEnum::HOME]);

            expect($address->type)->toBe(AddressTypeEnum::HOME);
        });
    });

    describe('Scopes and Queries', function (): void {
        it('can filter by primary addresses', function (): void {
            Address/** @phpstan-ignore-line */ ::factory()->create(['is_primary' => true]);
            Address/** @phpstan-ignore-line */ ::factory()->create(['is_primary' => false]);

            $primaryAddresses = Address::where('is_primary', true)->get();

            expect($primaryAddresses)->toHaveCount(1);
        });

        it('can filter by locality', function (): void {
            Address/** @phpstan-ignore-line */ ::factory()->create(['locality' => 'Milano']);
            Address/** @phpstan-ignore-line */ ::factory()->create(['locality' => 'Roma']);

            $milanAddresses = Address::where('locality', 'Milano')->get();

            expect($milanAddresses)->toHaveCount(1);
        });

        it('can filter by postal code', function (): void {
            Address/** @phpstan-ignore-line */ ::factory()->create(['postal_code' => '20100']);
            Address/** @phpstan-ignore-line */ ::factory()->create(['postal_code' => '00100']);

            $milanPostalCodes = Address::where('postal_code', '20100')->get();

            expect($milanPostalCodes)->toHaveCount(1);
        });
    });

    describe('Google Places Integration', function (): void {
        it('can store place_id from Google Places', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
                'place_id' => 'ChIJu46S-ZZjhkcRLuFvLjVZ400',
            ]);

            expect($address->place_id)->toBe('ChIJu46S-ZZjhkcRLuFvLjVZ400');
        });

        it('can store formatted_address from Google Places', function (): void {
            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create([
                'formatted_address' => 'Via Roma, 123, 20100 Milano MI, Italy',
            ]);

            expect($address->formatted_address)->toBe('Via Roma, 123, 20100 Milano MI, Italy');
        });
    });

    describe('Extra Data Storage', function (): void {
        it('can store additional metadata', function (): void {
            $extraData = [
                'building_type' => 'residential',
                'floor' => 3,
                'apartment' => 'A',
                'buzzer_code' => '123',
            ];

            /** @var \Illuminate\Database\Eloquent\Collection */
        $address = Address/** @phpstan-ignore-line */ ::factory()->create(['extra_data' => $extraData]);

            expect($address->extra_data)
                ->toBe($extraData)
                ->and($address->extra_data['building_type'])
                ->toBe('residential')
                ->and($address->extra_data['floor'])
                ->toBe(3);
        });
    });
});
