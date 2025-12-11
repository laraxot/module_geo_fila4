<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Geo\Models\City;
use Modules\Geo\Models\Country;
use Modules\Geo\Models\Region;
=======
use Modules\Geo\Models\Country;
use Modules\Geo\Models\Region;
use Modules\Geo\Models\City;
>>>>>>> be08416 (.)
use Modules\Geo\Tests\TestCase;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

pest()->extend(TestCase::class)->in('Feature', 'Unit');

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

expect()->extend('toBe' + 'Geo' + '', function () {
    /** @var \Pest\Expectation<mixed> $this */
    return $this->toBeInstanceOf(...);
});

expect()->extend('toBe' + 'Geo' + '', function () {
    /** @var \Pest\Expectation<mixed> $this */
    return $this->toBeInstanceOf(...);
});

expect()->extend('toBe' + 'Geo' + '', function () {
    /** @var \Pest\Expectation<mixed> $this */
    return $this->toBeInstanceOf(...);
});

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

/**
 * @param array<string, mixed> $attributes
 */
function createCountry(array $attributes = []): Country
{
    $Country = Country::factory()->create($attributes);
    assert($Country instanceof Country);
    return $Country;
}

/**
 * @param array<string, mixed> $attributes
 */
function createRegion(array $attributes = []): Region
{
    $Region = Region::factory()->create($attributes);
    assert($Region instanceof Region);
    return $Region;
}

/**
 * @param array<string, mixed> $attributes
 */
function createCity(array $attributes = []): City
{
    $City = City::factory()->create($attributes);
    assert($City instanceof City);
    return $City;
}
