<?php

declare(strict_types=1);

namespace Modules\Geo\Tests\Unit\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
use Exception;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Mockery;
>>>>>>> 1bb689f (.)
=======
use Illuminate\Support\Collection;
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
        $this->mockDistanceMatrixAction = \Mockery::mock(CalculateDistanceMatrixAction::class);
=======
        $this->mockDistanceMatrixAction = Mockery::mock(CalculateDistanceMatrixAction::class);
>>>>>>> 1bb689f (.)
=======
        $this->mockDistanceMatrixAction = \Mockery::mock(CalculateDistanceMatrixAction::class);
>>>>>>> 0746367 (.)
        $this->action = new CalculateDistanceAction($this->mockDistanceMatrixAction);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itCalculatesDistanceBetweenTwoValidLocations(): void
=======
    public function it_calculates_distance_between_two_valid_locations(): void
>>>>>>> 1bb689f (.)
=======
    public function itCalculatesDistanceBetweenTwoValidLocations(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
            ->with(\Mockery::type(Collection::class), \Mockery::type(Collection::class))
=======
            ->with(Mockery::type(Collection::class), Mockery::type(Collection::class))
>>>>>>> 1bb689f (.)
=======
            ->with(\Mockery::type(Collection::class), \Mockery::type(Collection::class))
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itThrowsExceptionForInvalidLatitude(): void
=======
    public function it_throws_exception_for_invalid_latitude(): void
>>>>>>> 1bb689f (.)
=======
    public function itThrowsExceptionForInvalidLatitude(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: 100.000000');
    }

    /** @test */
    public function itThrowsExceptionForInvalidLongitude(): void
=======
            ->toThrow(InvalidArgumentException::class, 'Latitudine non valida: 100.000000');
    }

    /** @test */
    public function it_throws_exception_for_invalid_longitude(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: 100.000000');
    }

    /** @test */
    public function itThrowsExceptionForInvalidLongitude(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: 200.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLatitude(): void
=======
            ->toThrow(InvalidArgumentException::class, 'Longitudine non valida: 200.000000');
    }

    /** @test */
    public function it_throws_exception_for_negative_latitude(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: 200.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLatitude(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: -100.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLongitude(): void
=======
            ->toThrow(InvalidArgumentException::class, 'Latitudine non valida: -100.000000');
    }

    /** @test */
    public function it_throws_exception_for_negative_longitude(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\InvalidArgumentException::class, 'Latitudine non valida: -100.000000');
    }

    /** @test */
    public function itThrowsExceptionForNegativeLongitude(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: -200.000000');
    }

    /** @test */
    public function itThrowsExceptionForEmptyResponse(): void
=======
            ->toThrow(InvalidArgumentException::class, 'Longitudine non valida: -200.000000');
    }

    /** @test */
    public function it_throws_exception_for_empty_response(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\InvalidArgumentException::class, 'Longitudine non valida: -200.000000');
    }

    /** @test */
    public function itThrowsExceptionForEmptyResponse(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itThrowsExceptionForMalformedResponse(): void
=======
    public function it_throws_exception_for_malformed_response(): void
>>>>>>> 1bb689f (.)
=======
    public function itThrowsExceptionForMalformedResponse(): void
>>>>>>> 0746367 (.)
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
        expect(fn () => $this->action->execute($origin, $destination))->toThrow(DistanceCalculationException::class);
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itThrowsExceptionWhenDistanceMatrixFails(): void
=======
    public function it_throws_exception_when_distance_matrix_fails(): void
>>>>>>> 1bb689f (.)
=======
    public function itThrowsExceptionWhenDistanceMatrixFails(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
            ->andThrow(new \Exception('API Error'));
=======
            ->andThrow(new Exception('API Error'));
>>>>>>> 1bb689f (.)
=======
            ->andThrow(new \Exception('API Error'));
>>>>>>> 0746367 (.)

        // Act & Assert
        expect(fn () => $this->action->execute($origin, $destination))
            ->toThrow(DistanceCalculationException::class, 'Errore nel calcolo della distanza: API Error');
    }

    /** @test */
<<<<<<< HEAD
<<<<<<< HEAD
    public function itFormatsDistanceInMetersCorrectly(): void
=======
    public function it_formats_distance_in_meters_correctly(): void
>>>>>>> 1bb689f (.)
=======
    public function itFormatsDistanceInMetersCorrectly(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itFormatsDistanceInKilometersCorrectly(): void
=======
    public function it_formats_distance_in_kilometers_correctly(): void
>>>>>>> 1bb689f (.)
=======
    public function itFormatsDistanceInKilometersCorrectly(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itFormatsDistanceWithDecimalKilometers(): void
=======
    public function it_formats_distance_with_decimal_kilometers(): void
>>>>>>> 1bb689f (.)
=======
    public function itFormatsDistanceWithDecimalKilometers(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itFormatsExactKilometerDistance(): void
=======
    public function it_formats_exact_kilometer_distance(): void
>>>>>>> 1bb689f (.)
=======
    public function itFormatsExactKilometerDistance(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itThrowsExceptionForNegativeDistance(): void
=======
    public function it_throws_exception_for_negative_distance(): void
>>>>>>> 1bb689f (.)
=======
    public function itThrowsExceptionForNegativeDistance(): void
>>>>>>> 0746367 (.)
    {
        // Arrange
        $negativeMeters = -100;

        // Act & Assert
        expect(fn () => $this->action->formatDistance($negativeMeters))
<<<<<<< HEAD
<<<<<<< HEAD
            ->toThrow(\InvalidArgumentException::class, 'La distanza non può essere negativa');
    }

    /** @test */
    public function itHandlesZeroDistance(): void
=======
            ->toThrow(InvalidArgumentException::class, 'La distanza non può essere negativa');
    }

    /** @test */
    public function it_handles_zero_distance(): void
>>>>>>> 1bb689f (.)
=======
            ->toThrow(\InvalidArgumentException::class, 'La distanza non può essere negativa');
    }

    /** @test */
    public function itHandlesZeroDistance(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itHandlesVerySmallDistances(): void
=======
    public function it_handles_very_small_distances(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesVerySmallDistances(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itHandlesVeryLargeDistances(): void
=======
    public function it_handles_very_large_distances(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesVeryLargeDistances(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itHandlesBoundaryLatitudeValues(): void
=======
    public function it_handles_boundary_latitude_values(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesBoundaryLatitudeValues(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itHandlesBoundaryLongitudeValues(): void
=======
    public function it_handles_boundary_longitude_values(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesBoundaryLongitudeValues(): void
>>>>>>> 0746367 (.)
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
<<<<<<< HEAD
    public function itHandlesSameOriginAndDestination(): void
=======
    public function it_handles_same_origin_and_destination(): void
>>>>>>> 1bb689f (.)
=======
    public function itHandlesSameOriginAndDestination(): void
>>>>>>> 0746367 (.)
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
