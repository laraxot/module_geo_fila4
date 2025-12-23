<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Builder;
use Modules\Geo\Enums\AddressTypeEnum;
use Modules\Geo\Models\Address;
use Modules\Geo\Models\BaseModel;

describe('Address Business Logic', function (): void {
    test('address extends base model', function (): void {
        expect(Address::class)->toBeSubclassOf(BaseModel::class);
    });

    test('address has expected fillable fields for postal address', function (): void {
        $address = new Address;
        $expectedFillable = [
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
        ];

        expect($address->getFillable())->toEqual($expectedFillable);
    });

    test('address has correct casts for geolocation and structured data', function (): void {
        $address = new Address;
        /** @phpstan-ignore-next-line method.nonObject */
        $casts = $address->getCasts();

        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['latitude'])->toBe('float');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['longitude'])->toBe('float');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['is_primary'])->toBe('boolean');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['extra_data'])->toBe('array');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['type'])->toBe(AddressTypeEnum::class);
    });

    test('address has polymorphic model relationship', function (): void {
        $address = new Address;

        expect(method_exists($address, 'model'))->toBeTrue();
        expect(method_exists($address, 'addressable'))->toBeTrue();
    });

    test('address can get region data from comune', function (): void {
        $address = new Address;

        expect(method_exists($address, 'getRegione'))->toBeTrue();
    });

    test('address can get province data from comune', function (): void {
        $address = new Address;

        expect(method_exists($address, 'getProvincia'))->toBeTrue();
    });

    test('address can get locality data from comune', function (): void {
        $address = new Address;

        expect(method_exists($address, 'getLocality'))->toBeTrue();
    });

    test('address can format full address attribute', function (): void {
        $address = new Address;
        $address->route = 'Via Roma';
        $address->street_number = '123';
        $address->locality = 'Milano';

        expect($address->full_address)->toContain('Via Roma 123');
        expect($address->full_address)->toContain('Milano');
    });

    test('address can format street address attribute', function (): void {
        $address = new Address;
        $address->route = 'Via Roma';
        $address->street_number = '123';

        expect($address->street_address)->toBe('Via Roma 123');
    });

    test('address can get geolocation coordinates', function (): void {
        $address = new Address;
        $address->latitude = 45.4642;
        $address->longitude = 9.1900;

        expect($address->getLatitude())->toBe(45.4642);
        expect($address->getLongitude())->toBe(9.1900);
    });

    test('address can export to schema org format', function (): void {
        $address = new Address;
        $address->name = 'Test Address';
        $address->route = 'Via Roma';
        $address->street_number = '123';

        /** @phpstan-ignore-next-line method.nonObject */
        $schemaOrg = $address->toSchemaOrg();

        expect($schemaOrg)->toHaveKey('@context');
        expect($schemaOrg)->toHaveKey('@type');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($schemaOrg['@context'])->toBe('https://schema.org');
        /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($schemaOrg['@type'])->toBe('PostalAddress');
    });

    test('address scope can query nearby addresses', function (): void {
        $query = Address::nearby(45.4642, 9.1900, 10);

        expect($query)->toBeInstanceOf(Builder::class);
    });

    test('address scope can query primary addresses', function (): void {
        $query = Address::primary();

        expect($query)->toBeInstanceOf(Builder::class);
    });

    test('address scope can query by type', function (): void {
        $query = Address::ofType(AddressTypeEnum::BILLING);

        expect($query)->toBeInstanceOf(Builder::class);
    });
});
