<?php

declare(strict_types=1);

namespace Modules\Geo\Exceptions;

class InvalidElevationDataException extends \Exception
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    public function __construct(
        string $message = 'Invalid elevation data',
        int $code = 0,
        ?\Exception $previous = null,
    ) {
<<<<<<< HEAD
=======
    public function __construct(string $message = 'Invalid elevation data', int $code = 0, ?Exception $previous = null)
    {
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
        parent::__construct($message, $code, $previous);
    }
}
