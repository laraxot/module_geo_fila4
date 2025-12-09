<?php

declare(strict_types=1);

namespace Modules\Geo\Tests\Unit\Actions;

<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
use InvalidArgumentException;
use Exception;
use Illuminate\Support\Collection;
use Mockery;
>>>>>>> be08416 (.)
use Modules\Geo\Actions\CalculateDistanceAction;
use Modules\Geo\Actions\GoogleMaps\CalculateDistanceMatrixAction;
use Modules\Geo\Datas\LocationData;
use Modules\Geo\Exceptions\DistanceCalculationException;
use Tests\TestCase;

class CalculateDistanceActionTest extends TestCase
{
    private CalculateDistanceAction $action;

    private CalculateDistanceMatrixAction $mockDistanceMatrixAction;

    protected function setUp(): void
    {
        parent::setUp();
<<<<<<< HEAD
        $this->mockDistanceMatrixAction = \Mockery::mock(CalculateDistanceMatrixAction::class);
=======
        $this->mockDistanceMatrixAction = Mockery::mock(CalculateDistanceMatrixAction::class);
>>>>>>> be08416 (.)
        $this->action = new CalculateDistanceAction($this->mockDistanceMatrixAction);
    }

    /** @test */
<<<<<<< HEAD
    public function itCalculatesDistanceBetweenTwoValidLocations(): void
=======
    public function it_calculates_distance_between_two_valid_locations(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 9.1900,
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $expectedResponse = [
            [
                [
                    'distance' => ['text' => '572 km', 'value' => 572000],
                    'duration' => ['text' => '5 ore 30 min', 'value' => 19800],
                    'status' => 'OK',
                ],
            ],
        ];

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
<<<<<<< HEAD
            ->with(\Mockery::type(Collection::class), \Mockery::type(Collection::class))
=======
            ->with(Mockery::type(Collection::class), Mockery::type(Collection::class))
>>>>>>> be08416 (.)
            ->andReturn($expectedResponse);

        // Act
        $result = $this->action->execute($origin, $destination);

        // Assert
        expect($result)
            ->toBeArray()
            ->and($result['distance']['text'])
            ->toBe('572 km')
            ->and($result['distance']['value'])
            ->toBe(572000)
            ->and($result['duration']['text'])
            ->toBe('5 ore 30 min')
            ->and($result['duration']['value'])
            ->toBe(19800)
            ->and($result['status'])
            ->toBe('OK');
    }

    /** @test */
<<<<<<< HEAD
    public function itThrowsExceptionForInvalidLatitude(): void
=======
    public function it_throws_exception_for_invalid_latitude(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 100.0, // Invalid latitude > 90
            longitude: 9.1900,
            address: 'Invalid Location',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: 100.000000');
    }

    /** @test */
    public function itThrowsExceptionForInvalidLongitude(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))
            ->toThrow(InvalidArgumentException::class, 'Latitudine non valida: 100.000000');
    }

    /** @test */
    public function it_throws_exception_for_invalid_longitude(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 200.0, // Invalid longitude > 180
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: 200.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLatitude(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))
            ->toThrow(InvalidArgumentException::class, 'Longitudine non valida: 200.000000');
    }

    /** @test */
    public function it_throws_exception_for_negative_latitude(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: -100.0, // Invalid latitude < -90
            longitude: 9.1900,
            address: 'Invalid Location',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: -100.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLongitude(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))
            ->toThrow(InvalidArgumentException::class, 'Latitudine non valida: -100.000000');
    }

    /** @test */
    public function it_throws_exception_for_negative_longitude(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: -200.0, // Invalid longitude < -180
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: -200.000000');
    }

    /** @test */
    public function itThrowsExceptionForEmptyResponse(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))
            ->toThrow(InvalidArgumentException::class, 'Longitudine non valida: -200.000000');
    }

    /** @test */
    public function it_throws_exception_for_empty_response(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 9.1900,
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
            ->andReturn([]);

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
    public function itThrowsExceptionForMalformedResponse(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
    public function it_throws_exception_for_malformed_response(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 9.1900,
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $malformedResponse = [['invalid_structure']];

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
            ->andReturn($malformedResponse);

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
    public function itThrowsExceptionWhenDistanceMatrixFails(): void
=======
        expect(fn() => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
    public function it_throws_exception_when_distance_matrix_fails(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 9.1900,
            address: 'Milano, Italia',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
<<<<<<< HEAD
            ->andThrow(new \Exception('API Error'));

        // Act & Assert
        expect(fn () => $this->action->execute($origin, $destination))
=======
            ->andThrow(new Exception('API Error'));

        // Act & Assert
        expect(fn() => $this->action->execute($origin, $destination))
>>>>>>> be08416 (.)
            ->toThrow(DistanceCalculationException::class, 'Errore nel calcolo della distanza: API Error');
    }

    /** @test */
<<<<<<< HEAD
    public function itFormatsDistanceInMetersCorrectly(): void
=======
    public function it_formats_distance_in_meters_correctly(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $meters = 500;

        // Act
        $result = $this->action->formatDistance($meters);

        // Assert
        expect($result)->toBe('500 m');
    }

    /** @test */
<<<<<<< HEAD
    public function itFormatsDistanceInKilometersCorrectly(): void
=======
    public function it_formats_distance_in_kilometers_correctly(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $meters = 1500;

        // Act
        $result = $this->action->formatDistance($meters);

        // Assert
        expect($result)->toBe('1.5 km');
    }

    /** @test */
<<<<<<< HEAD
    public function itFormatsDistanceWithDecimalKilometers(): void
=======
    public function it_formats_distance_with_decimal_kilometers(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $meters = 2500;

        // Act
        $result = $this->action->formatDistance($meters);

        // Assert
        expect($result)->toBe('2.5 km');
    }

    /** @test */
<<<<<<< HEAD
    public function itFormatsExactKilometerDistance(): void
=======
    public function it_formats_exact_kilometer_distance(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $meters = 1000;

        // Act
        $result = $this->action->formatDistance($meters);

        // Assert
        expect($result)->toBe('1.0 km');
    }

    /** @test */
<<<<<<< HEAD
    public function itThrowsExceptionForNegativeDistance(): void
=======
    public function it_throws_exception_for_negative_distance(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $negativeMeters = -100;

        // Act & Assert
<<<<<<< HEAD
        expect(fn () => $this->action->formatDistance($negativeMeters))
            ->toThrow(\InvalidArgumentException::class, 'La distanza non può essere negativa');
    }

    /** @test */
    public function itHandlesZeroDistance(): void
=======
        expect(fn() => $this->action->formatDistance($negativeMeters))
            ->toThrow(InvalidArgumentException::class, 'La distanza non può essere negativa');
    }

    /** @test */
    public function it_handles_zero_distance(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $zeroMeters = 0;

        // Act
        $result = $this->action->formatDistance($zeroMeters);

        // Assert
        expect($result)->toBe('0 m');
    }

    /** @test */
<<<<<<< HEAD
    public function itHandlesVerySmallDistances(): void
=======
    public function it_handles_very_small_distances(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $smallMeters = 1;

        // Act
        $result = $this->action->formatDistance($smallMeters);

        // Assert
        expect($result)->toBe('1 m');
    }

    /** @test */
<<<<<<< HEAD
    public function itHandlesVeryLargeDistances(): void
=======
    public function it_handles_very_large_distances(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $largeMeters = 999999;

        // Act
        $result = $this->action->formatDistance($largeMeters);

        // Assert
        expect($result)->toBe('1000.0 km');
    }

    /** @test */
<<<<<<< HEAD
    public function itHandlesBoundaryLatitudeValues(): void
=======
    public function it_handles_boundary_latitude_values(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 90.0, // Boundary value
            longitude: 9.1900,
            address: 'Boundary Location',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $expectedResponse = [
            [
                [
                    'distance' => ['text' => '100 km', 'value' => 100000],
                    'duration' => ['text' => '1 ora', 'value' => 3600],
                    'status' => 'OK',
                ],
            ],
        ];

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
            ->andReturn($expectedResponse);

        // Act
        $result = $this->action->execute($origin, $destination);

        // Assert
        expect($result)->toBeArray()->and($result['status'])->toBe('OK');
    }

    /** @test */
<<<<<<< HEAD
    public function itHandlesBoundaryLongitudeValues(): void
=======
    public function it_handles_boundary_longitude_values(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $origin = new LocationData(
            latitude: 45.4642,
            longitude: 180.0, // Boundary value
            address: 'Boundary Location',
        );

        $destination = new LocationData(
            latitude: 41.9028,
            longitude: 12.4964,
            address: 'Roma, Italia',
        );

        $expectedResponse = [
            [
                [
                    'distance' => ['text' => '100 km', 'value' => 100000],
                    'duration' => ['text' => '1 ora', 'value' => 3600],
                    'status' => 'OK',
                ],
            ],
        ];

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
            ->andReturn($expectedResponse);

        // Act
        $result = $this->action->execute($origin, $destination);

        // Assert
        expect($result)->toBeArray()->and($result['status'])->toBe('OK');
    }

    /** @test */
<<<<<<< HEAD
    public function itHandlesSameOriginAndDestination(): void
=======
    public function it_handles_same_origin_and_destination(): void
>>>>>>> be08416 (.)
    {
        // Arrange
        $sameLocation = new LocationData(
            latitude: 45.4642,
            longitude: 9.1900,
            address: 'Milano, Italia',
        );

        $expectedResponse = [
            [
                [
                    'distance' => ['text' => '0 m', 'value' => 0],
                    'duration' => ['text' => '0 min', 'value' => 0],
                    'status' => 'OK',
                ],
            ],
        ];

        $this->mockDistanceMatrixAction
            ->shouldReceive('execute')
            ->once()
            ->andReturn($expectedResponse);

        // Act
        $result = $this->action->execute($sameLocation, $sameLocation);

        // Assert
        expect($result)
            ->toBeArray()
            ->and($result['distance']['value'])
            ->toBe(0)
            ->and($result['duration']['value'])
            ->toBe(0);
    }

    protected function tearDown(): void
    {
<<<<<<< HEAD
        \Mockery::close();
=======
        Mockery::close();
>>>>>>> be08416 (.)
        parent::tearDown();
    }
}
