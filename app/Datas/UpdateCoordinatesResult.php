<?php

declare(strict_types=1);

namespace Modules\Geo\Datas;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

/**
 * Result DTO for bulk coordinate update operations.
 *
 * Encapsulates statistics and error details from UpdateCoordinatesAction.
 */
class UpdateCoordinatesResult extends Data
{
    /**
<<<<<<< HEAD
     * @param int $totalProcessed Total number of records processed
     * @param int $successCount Number of successfully updated records
     * @param int $failureCount Number of failed updates
     * @param Collection<int, array{model: string, error: string}> $errors Collection of error details
=======
     * @param int                                                  $totalProcessed Total number of records processed
     * @param int                                                  $successCount   Number of successfully updated records
     * @param int                                                  $failureCount   Number of failed updates
     * @param Collection<int, array{model: string, error: string}> $errors         Collection of error details
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
     */
    public function __construct(
        public readonly int $totalProcessed,
        public readonly int $successCount,
        public readonly int $failureCount,
        public readonly Collection $errors,
    ) {
    }

    /**
     * Check if there were any errors during processing.
     */
    public function hasErrors(): bool
    {
        return $this->failureCount > 0;
    }

    /**
     * Check if all operations were successful.
     */
    public function isCompleteSuccess(): bool
    {
<<<<<<< HEAD
        return $this->failureCount === 0 && $this->successCount > 0;
=======
        return 0 === $this->failureCount && $this->successCount > 0;
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
    }

    /**
     * Check if all operations failed.
     */
    public function isCompleteFailure(): bool
    {
<<<<<<< HEAD
        return $this->successCount === 0 && $this->totalProcessed > 0;
=======
        return 0 === $this->successCount && $this->totalProcessed > 0;
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
    }

    /**
     * Get success rate as percentage.
     */
    public function getSuccessRate(): float
    {
<<<<<<< HEAD
        if ($this->totalProcessed === 0) {
=======
        if (0 === $this->totalProcessed) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
            return 0.0;
        }

        return ($this->successCount / $this->totalProcessed) * 100;
    }

    /**
     * Get formatted error messages.
     *
     * @return array<int, string>
     */
    public function getErrorMessages(): array
    {
<<<<<<< HEAD
        /** @var array<int, string> */
=======
        /* @var array<int, string> */
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
        return $this->errors
            ->map(fn (array $error): string => "{$error['model']}: {$error['error']}")
            ->toArray();
    }

    /**
     * Get summary message for notifications.
     */
    public function getSummaryMessage(): string
    {
        $rate = number_format($this->getSuccessRate(), 1);

        return "Processed {$this->totalProcessed} records. "
            ."Successfully updated {$this->successCount} ({$rate}%). "
            ."Failed: {$this->failureCount}.";
    }
}
