<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Eccezione lanciata quando si verificano errori durante il calcolo della distanza.
 */
class DistanceCalculationException extends \RuntimeException
=======
use RuntimeException;
use Throwable;

/**
 * Eccezione lanciata quando si verificano errori durante il calcolo della distanza.
 */
class DistanceCalculationException extends RuntimeException
>>>>>>> 1bb689f (.)
=======
/**
 * Eccezione lanciata quando si verificano errori durante il calcolo della distanza.
 */
class DistanceCalculationException extends \RuntimeException
>>>>>>> 0746367 (.)
{
    /**
     * Crea una nuova istanza per risposta non valida.
     */
    public static function invalidResponse(string $message = 'Risposta non valida dal servizio di calcolo distanze'): self
    {
        return new self($message);
    }

    /**
     * Crea una nuova istanza per coordinate non valide.
     */
    public static function invalidCoordinates(string $message = 'Coordinate non valide'): self
    {
        return new self($message);
    }

    /**
     * Crea una nuova istanza per errore di calcolo.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public static function calculationError(string $message, ?\Throwable $previous = null): self
=======
    public static function calculationError(string $message, ?Throwable $previous = null): self
>>>>>>> 1bb689f (.)
=======
    public static function calculationError(string $message, ?\Throwable $previous = null): self
>>>>>>> 0746367 (.)
    {
        return new self($message, 0, $previous);
    }
}
