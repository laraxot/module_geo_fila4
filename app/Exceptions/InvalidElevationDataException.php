<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

<<<<<<< HEAD
<<<<<<< HEAD
class InvalidElevationDataException extends \Exception
=======
use Exception;

class InvalidElevationDataException extends Exception
>>>>>>> 1bb689f (.)
=======
class InvalidElevationDataException extends \Exception
>>>>>>> 0746367 (.)
{
    public function __construct(
        string $message = 'Invalid elevation data',
        int $code = 0,
<<<<<<< HEAD
<<<<<<< HEAD
        ?\Exception $previous = null,
=======
        ?Exception $previous = null,
>>>>>>> 1bb689f (.)
=======
        ?\Exception $previous = null,
>>>>>>> 0746367 (.)
    ) {
        parent::__construct($message, $code, $previous);
    }
}
