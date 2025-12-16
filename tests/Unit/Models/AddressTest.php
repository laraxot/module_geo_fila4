<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
namespace Modules\Geo\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Geo\Models\Address;
use Modules\Geo\Models\Comune;
use Modules\Geo\Models\Province;
<<<<<<< HEAD
=======
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);
<<<<<<< HEAD
=======
=======
=======
namespace Modules\Geo\Tests\Unit\Models;

>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Geo\Models\Address;
use Modules\Geo\Models\Comune;
use Modules\Geo\Models\Province;
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);
>>>>>>> b93ef594b4 (.)
=======
namespace Modules\Geo\Tests\Unit\Models;

use Modules\Geo\Models\Address;
use Modules\Geo\Models\Comune;
use Modules\Geo\Models\Province;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
>>>>>>> c24a803 (.)

beforeEach(function (): void {
    $this->address = Address::factory()->create();
});

test('address can be created', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address)->toBeInstanceOf(Address::class);
});

test('address has fillable attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $fillable = $this->address->getFillable();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($fillable)->toContain('street');
    expect($fillable)->toContain('number');
    expect($fillable)->toContain('postal_code');
    expect($fillable)->toContain('city');
});

test('address has casts defined', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $casts = $this->address->getCasts();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
    expect($casts)->toHaveKey('coordinates');
});

test('address has proper table name', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address->getTable())->toBe('addresses');
});

test('address belongs to comune', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $comune = Comune::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $this->address->update(['comune_id' => $comune->id]);
<<<<<<< HEAD

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
=======
    /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 30b582c (.)
    expect($this->address->fresh()->comune)->toBeInstanceOf(Comune::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address->fresh()->comune->id)->toBe($comune->id);
});

test('address belongs to province', function (): void {
    /** @var \Illuminate\Database\Eloquent\Collection */
        $province = Province::factory()->create();
    /** @phpstan-ignore-next-line property.notFound */
    $this->address->update(['province_id' => $province->id]);
<<<<<<< HEAD

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
=======
    /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 30b582c (.)
    expect($this->address->fresh()->province)->toBeInstanceOf(Province::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address->fresh()->province->id)->toBe($province->id);
});

test('address can get full address', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->address->update([
        'street' => 'Via Roma',
        'number' => '123',
        'postal_code' => '00100',
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
        'city' => 'Roma',
    ]);

    /** @phpstan-ignore-next-line property.notFound */
    $fullAddress = $this->address->getFullAddressAttribute();

<<<<<<< HEAD
=======
=======
        'city' => 'Roma'
    ]);
    
    $fullAddress = $this->address->getFullAddressAttribute();
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($fullAddress)->toBe('Via Roma, 123 - 00100 Roma');
});

test('address can be searched by street', function (): void {
    $searchResult = Address::search('test')->get();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($searchResult)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($searchResult->first()->id)->toBe($this->address->id);
});

test('address can be filtered by city', function (): void {
    $cityAddresses = Address::byCity('test')->get();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($cityAddresses)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($cityAddresses->first()->id)->toBe($this->address->id);
});

test('address can be filtered by postal code', function (): void {
    $postalCodeAddresses = Address::byPostalCode('test')->get();
<<<<<<< HEAD

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    expect($postalCodeAddresses)->toHaveCount(1);
    /** @phpstan-ignore-next-line property.notFound */
    expect($postalCodeAddresses->first()->id)->toBe($this->address->id);
});

<<<<<<< HEAD
test('address has proper relationships', function () {
<<<<<<< HEAD
=======
test('address has proper relationships', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 30b582c (.)
    expect($this->address->comune())->toBeInstanceOf(BelongsTo::class);
    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address->province())->toBeInstanceOf(BelongsTo::class);
=======
<<<<<<< HEAD
    expect($this->address->comune())->toBeInstanceOf(BelongsTo::class);
    expect($this->address->province())->toBeInstanceOf(BelongsTo::class);
=======
    expect($this->address->comune())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
    expect($this->address->province())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
});

test('address can validate coordinates', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $this->address->update(['coordinates' => ['lat' => 41.9028, 'lng' => 12.4964]]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)

    /** @phpstan-ignore-next-line property.notFound */
    expect($this->address->fresh()->hasValidCoordinates())->toBeTrue();

    /** @phpstan-ignore-next-line property.notFound */
    $this->address->update(['coordinates' => null]);

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    
    expect($this->address->fresh()->hasValidCoordinates())->toBeTrue();
    
    $this->address->update(['coordinates' => null]);
    
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
=======
    /** @phpstan-ignore-next-line property.notFound */
>>>>>>> 30b582c (.)
    expect($this->address->fresh()->hasValidCoordinates())->toBeFalse();
});
