<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

<<<<<<< HEAD
class InvalidElevationDataException extends \Exception
=======
use Exception;

class InvalidElevationDataException extends Exception
>>>>>>> be08416 (.)
{
<<<<<<< HEAD
    public function __construct(
        string $message = 'Invalid elevation data',
        int $code = 0,
<<<<<<< HEAD
        ?\Exception $previous = null,
=======
        null|Exception $previous = null,
>>>>>>> be08416 (.)
    ) {
=======
    public function __construct(string $message = 'Invalid elevation data', int $code = 0, ?Exception $previous = null)
    {
>>>>>>> bc26394 (.)
        parent::__construct($message, $code, $previous);
    }
}
