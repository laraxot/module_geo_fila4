<?php

declare(strict_types=1);

namespace Modules\Geo\Tests\Unit\Actions;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Geo\Actions\GetCoordinatesAction;
use Modules\Geo\Datas\LocationData;
=======
use Mockery;
use Modules\Geo\Actions\GetCoordinatesAction;
use Modules\Geo\Datas\LocationData;
use RuntimeException;
>>>>>>> 1bb689f (.)
=======
use Modules\Geo\Actions\GetCoordinatesAction;
use Modules\Geo\Datas\LocationData;
>>>>>>> 0746367 (.)
use Tests\TestCase;

class GetCoordinatesActionTest extends TestCase
{
    private GetCoordinatesAction $action;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
<<<<<<< HEAD
        $this->action = new GetCoordinatesAction();
    }

    /** @test */
    public function itReturnsCoordinatesForValidAddress(): void
=======
        $this->action = new GetCoordinatesAction;
    }

    /** @test */
    public function it_returns_coordinates_for_valid_address(): void
>>>>>>> 1bb689f (.)
=======
        $this->action = new GetCoordinatesAction();
    }

    /** @test */
    public function itReturnsCoordinatesForValidAddress(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';
        $expectedLatitude = 45.4642;
        $expectedLongitude = 9.1900;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)
            ->toBeInstanceOf(LocationData::class)
            ->and($result->latitude)
            ->toBe($expectedLatitude)
            ->and($result->longitude)
            ->toBe($expectedLongitude)
            ->and($result->address)
            ->toBe($address);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itThrowsExceptionWhenApiKeyMissing(): void
=======
    public function it_throws_exception_when_api_key_missing(): void
>>>>>>> 1bb689f (.)
=======
    public function itThrowsExceptionWhenApiKeyMissing(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';
        Config::set('services.google.maps.key', null);

        // Act & Assert
        expect(fn () => $this->action->execute($address))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\RuntimeException::class, 'Google Maps API key not found');
    }

    /** @test */
    public function itThrowsExceptionWhenApiRequestFails(): void
=======
            ->toThrow(RuntimeException::class, 'Google Maps API key not found');
    }

    /** @test */
    public function it_throws_exception_when_api_request_fails(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\RuntimeException::class, 'Google Maps API key not found');
    }

    /** @test */
    public function itThrowsExceptionWhenApiRequestFails(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response([], 500),
        ]);

        // Act & Assert
        expect(fn () => $this->action->execute($address))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function itReturnsNullForInvalidAddress(): void
=======
            ->toThrow(RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function it_returns_null_for_invalid_address(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function itReturnsNullForInvalidAddress(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Invalid Address That Does Not Exist';

        $mockResponse = [
            'status' => 'ZERO_RESULTS',
            'results' => [],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeNull();
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itReturnsNullForOverQueryLimitStatus(): void
=======
    public function it_returns_null_for_over_query_limit_status(): void
>>>>>>> 1bb689f (.)
=======
    public function itReturnsNullForOverQueryLimitStatus(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        $mockResponse = [
            'status' => 'OVER_QUERY_LIMIT',
            'results' => [],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeNull();
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itReturnsNullForRequestDeniedStatus(): void
=======
    public function it_returns_null_for_request_denied_status(): void
>>>>>>> 1bb689f (.)
=======
    public function itReturnsNullForRequestDeniedStatus(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        $mockResponse = [
            'status' => 'REQUEST_DENIED',
            'results' => [],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeNull();
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesEmptyResultsArray(): void
=======
    public function it_handles_empty_results_array(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesEmptyResultsArray(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        $mockResponse = [
            'status' => 'OK',
            'results' => [],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeNull();
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesMultipleResultsAndReturnsFirst(): void
=======
    public function it_handles_multiple_results_and_returns_first(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesMultipleResultsAndReturnsFirst(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma, Italia';
        $expectedLatitude = 45.4642;
        $expectedLongitude = 9.1900;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
                [
                    'geometry' => [
                        'location' => [
                            'lat' => 41.9028,
                            'lng' => 12.4964,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)
            ->toBeInstanceOf(LocationData::class)
            ->and($result->latitude)
            ->toBe($expectedLatitude)
            ->and($result->longitude)
            ->toBe($expectedLongitude);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesSpecialCharactersInAddress(): void
=======
    public function it_handles_special_characters_in_address(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesSpecialCharactersInAddress(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia - Ufficio 4° piano';
        $expectedLatitude = 45.4642;
        $expectedLongitude = 9.1900;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeInstanceOf(LocationData::class)->and($result->address)->toBe($address);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesNumericCoordinatesCorrectly(): void
=======
    public function it_handles_numeric_coordinates_correctly(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesNumericCoordinatesCorrectly(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = '123 Main St, New York, NY';
        $expectedLatitude = 40.7128;
        $expectedLongitude = -74.0060;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)
            ->toBeInstanceOf(LocationData::class)
            ->and($result->latitude)
            ->toBe($expectedLatitude)
            ->and($result->longitude)
            ->toBe($expectedLongitude);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesVeryLongAddresses(): void
=======
    public function it_handles_very_long_addresses(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesVeryLongAddresses(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = str_repeat('Via Roma 123, Milano, Italia - ', 50).'Ufficio 4° piano';
        $expectedLatitude = 45.4642;
        $expectedLongitude = 9.1900;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)->toBeInstanceOf(LocationData::class)->and($result->address)->toBe($address);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesCoordinatesWithHighPrecision(): void
=======
    public function it_handles_coordinates_with_high_precision(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesCoordinatesWithHighPrecision(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Precise Location Test';
        $expectedLatitude = 45.4642034;
        $expectedLongitude = 9.1900001;

        $mockResponse = [
            'status' => 'OK',
            'results' => [
                [
                    'geometry' => [
                        'location' => [
                            'lat' => $expectedLatitude,
                            'lng' => $expectedLongitude,
                        ],
                    ],
                ],
            ],
        ];

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response($mockResponse, 200),
        ]);

        // Act
        $result = $this->action->execute($address);

        // Assert
        expect($result)
            ->toBeInstanceOf(LocationData::class)
            ->and($result->latitude)
            ->toBe($expectedLatitude)
            ->and($result->longitude)
            ->toBe($expectedLongitude);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itHandlesNetworkTimeoutGracefully(): void
=======
    public function it_handles_network_timeout_gracefully(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesNetworkTimeoutGracefully(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response([], 408), // Request Timeout
        ]);

        // Act & Assert
        expect(fn () => $this->action->execute($address))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function itHandlesInvalidJsonResponse(): void
=======
            ->toThrow(RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function it_handles_invalid_json_response(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\RuntimeException::class, 'Failed to get coordinates from Google Maps API');
    }

    /** @test */
    public function itHandlesInvalidJsonResponse(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $address = 'Via Roma 123, Milano, Italia';

        Config::set('services.google.maps.key', 'test-api-key');
        Http::fake([
            'maps.googleapis.com/*' => Http::response('Invalid JSON', 200),
        ]);

        // Act & Assert
<<<<<<< HEAD
<<<<<<< HEAD
        expect(fn () => $this->action->execute($address))->toThrow(\RuntimeException::class);
=======
        expect(fn () => $this->action->execute($address))->toThrow(RuntimeException::class);
>>>>>>> 1bb689f (.)
=======
        expect(fn () => $this->action->execute($address))->toThrow(\RuntimeException::class);
>>>>>>> 0746367 (.)
    }

    protected function tearDown(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        \Mockery::close();
=======
        Mockery::close();
>>>>>>> 1bb689f (.)
=======
        \Mockery::close();
>>>>>>> 0746367 (.)
        parent::tearDown();
    }
}
