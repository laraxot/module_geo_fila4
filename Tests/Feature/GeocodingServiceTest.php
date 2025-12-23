<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Modules\Geo\Services\GeocodingService;

beforeEach(function (): void {
    $this->service = new GeocodingService();
});

test('geocode returns coordinates for valid address', function (): void {
    Http::fake([
        'nominatim.openstreetmap.org/search*' => Http::response([
            [
                'lat' => '45.4642',
                'lon' => '9.1900',
                'display_name' => 'Milano, Italy',
                'address' => ['city' => 'Milano', 'country' => 'Italy'],
            ],
        ]),
    ]);

    $result = $this->service->geocode('Milano, Italy');

    expect($result)->not->toBeNull();
    expect($result['latitude'])->toBe(45.4642);
    expect($result['longitude'])->toBe(9.1900);
});

test('reverse geocode returns address for coordinates', function (): void {
    Http::fake([
        'nominatim.openstreetmap.org/reverse*' => Http::response([
            'display_name' => 'Via Roma 45, Milano, Italy',
            'address' => [
                'road' => 'Via Roma',
                'house_number' => '45',
                'city' => 'Milano',
                'country' => 'Italy',
            ],
        ]),
    ]);

    $result = $this->service->reverseGeocode(45.4642, 9.1900);

    expect($result)->not->toBeNull();
    expect($result)->toContain('Via Roma');
});

test('geocode uses cache', function (): void {
    Http::fake([
        'nominatim.openstreetmap.org/search*' => Http::response([
            [
                'lat' => '45.4642',
                'lon' => '9.1900',
                'display_name' => 'Milano, Italy',
            ],
        ]),
    ]);

    // First call
    $this->service->geocode('Milano, Italy');

    // Second call should use cache
    $this->service->geocode('Milano, Italy');

    // Should only make one HTTP request
    Http::assertSentCount(1);
});

test('calculate distance returns correct value', function (): void {
    // Milano to Roma (approx 480km)
    $distance = $this->service->calculateDistance(
        45.4642, // Milano lat
        9.1900,  // Milano lon
        41.9028, // Roma lat
        12.4964  // Roma lon
    );

    // Should be approximately 480,000 meters
    expect($distance)->toBeGreaterThan(470000);
    expect($distance)->toBeLessThan(490000);
});

test('is within radius returns true for nearby points', function (): void {
    $result = $this->service->isWithinRadius(
        45.4642, // Center lat
        9.1900,  // Center lon
        45.4650, // Point lat (very close)
        9.1910,  // Point lon
        1000     // 1km radius
    );

    expect($result)->toBeTrue();
});

test('is within radius returns false for distant points', function (): void {
    $result = $this->service->isWithinRadius(
        45.4642, // Milano
        9.1900,
        41.9028, // Roma
        12.4964,
        1000     // 1km radius
    );

    expect($result)->toBeFalse();
});

test('geocode handles API errors gracefully', function (): void {
    Http::fake([
        'nominatim.openstreetmap.org/search*' => Http::response([], 500),
    ]);

    $result = $this->service->geocode('Invalid Address');

    expect($result)->toBeNull();
});
