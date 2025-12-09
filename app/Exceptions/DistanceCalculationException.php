<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

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
>>>>>>> be08416 (.)
{
    /**
     * Crea una nuova istanza per risposta non valida.
     */
<<<<<<< HEAD
    public static function invalidResponse(string $message = 'Risposta non valida dal servizio di calcolo distanze'): self
    {
=======
    public static function invalidResponse(string $message = 'Risposta non valida dal servizio di calcolo distanze'): self {
>>>>>>> be08416 (.)
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
    public static function calculationError(string $message, ?\Throwable $previous = null): self
=======
    public static function calculationError(string $message, null|Throwable $previous = null): self
>>>>>>> be08416 (.)
    {
        return new self($message, 0, $previous);
    }
}
