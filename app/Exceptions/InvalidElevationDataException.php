<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

<<<<<<< HEAD
class InvalidElevationDataException extends \Exception
=======
use Exception;

class InvalidElevationDataException extends Exception
>>>>>>> 1bb689f (.)
{
    public function __construct(
        string $message = 'Invalid elevation data',
        int $code = 0,
<<<<<<< HEAD
        ?\Exception $previous = null,
=======
        ?Exception $previous = null,
>>>>>>> 1bb689f (.)
    ) {
        parent::__construct($message, $code, $previous);
    }
}
