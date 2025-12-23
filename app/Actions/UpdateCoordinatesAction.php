<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Geo\Datas\UpdateCoordinatesResult;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD

/**
 * Update coordinates (latitude/longitude) for a collection of models.
 *
 * This action performs bulk geocoding using the GetAddressDataFromFullAddressAction
 * and updates each model with the retrieved coordinates.
 *
 * Features:
 * - Queueable for large batches
 * - Error tracking per model
 * - Configurable address attribute
 * - Type-safe with PHPStan Level 10
 *
 * Example usage:
 * ```php
 * $result = app(UpdateCoordinatesAction::class)->execute($clients);
 *
 * if ($result->isCompleteSuccess()) {
 *     // All coordinates updated
 * }
 * ```
 */
class UpdateCoordinatesAction
{
    use QueueableAction;

    /**
     * Execute bulk coordinate update.
     *
     * @param Collection<int, Model> $models           Collection of models to update
     * @param string                 $addressAttribute Attribute containing the full address
     *
     * @return UpdateCoordinatesResult Result with statistics and errors
     */
    public function execute(
        Collection $models,
        string $addressAttribute = 'full_address',
    ): UpdateCoordinatesResult {
        $geocodingAction = app(GetAddressDataFromFullAddressAction::class);

        $totalProcessed = 0;
        $successCount = 0;
        $failureCount = 0;
        /** @var \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors */
        $errors = collect();

        foreach ($models as $model) {
            $outcome = $this->processSingleModelAndCollectErrors($model, $addressAttribute, $geocodingAction, $errors);
            ++$totalProcessed;
            if (true === $outcome) {
                ++$successCount;
            } elseif (false === $outcome) {
                ++$failureCount;
            }
        }

        return new UpdateCoordinatesResult($totalProcessed, $successCount, $failureCount, $errors);
    }

    /**
     * Process a single model for coordinate update and collect errors.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return bool|null true for success, false for failure (error pushed), null for skipped model
     */
    private function processSingleModelAndCollectErrors(
        Model $model,
        string $addressAttribute,
        GetAddressDataFromFullAddressAction $geocodingAction,
        \Illuminate\Support\Collection $errors,
    ): ?bool {
        try {
            $fullAddress = $this->validateAddress($model, $addressAttribute, $errors);
            if (null === $fullAddress) {
                return null;
            }

            $addressData = $this->performGeocoding($fullAddress, $geocodingAction, $model, $errors);
            if (null === $addressData) {
                return false;
            }

            /** @var array<string, string|int|float|bool|null> $updateData */
            $updateData = $this->extractUpdateData($addressData, $model, $errors);
            if (null === $updateData) {
                return false;
            }

            $model->update($updateData);

            return true;
        } catch (\Throwable $e) {
            $this->addError($errors, $model, $e->getMessage());

            return false;
        }
    }

    /**
     * Validate and retrieve the full address from the model.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return string|null the full address on success, null on failure
     */
    private function validateAddress(Model $model, string $addressAttribute, \Illuminate\Support\Collection $errors): ?string
    {
        $fullAddress = $model->getAttribute($addressAttribute);
        if (! is_string($fullAddress) || '' === $fullAddress) {
            $this->addError($errors, $model, "Missing or invalid {$addressAttribute} attribute");

            return null;
        }

        return $fullAddress;
    }

    /**
     * Perform geocoding and validate the result.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return object|null the address data object on success, null on failure
     */
    private function performGeocoding(
        string $fullAddress,
        GetAddressDataFromFullAddressAction $geocodingAction,
        Model $model,
        \Illuminate\Support\Collection $errors,
    ): ?object {
        $addressData = $geocodingAction->execute($fullAddress);

        if (null === $addressData) {
            $geocodingErrors = $geocodingAction->errors;
            $errorMsg = $geocodingErrors->isNotEmpty()
                ? $geocodingErrors->join(', ')
                : 'Geocoding service returned no data';

            $this->addError($errors, $model, is_string($errorMsg) ? $errorMsg : 'Unknown error');

            return null;
        }

        return $addressData;
    }

    /**
     * Extract update data (latitude/longitude) from address data.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return array<string, string|int|float|bool|null>|null update data on success, null on failure
     */
    private function extractUpdateData(object $addressData, Model $model, \Illuminate\Support\Collection $errors): ?array
    {
        if (! method_exists($addressData, 'toArray')) {
            $this->addError($errors, $model, 'AddressData does not have toArray method');

            return null;
        }

        $toArray = $addressData->toArray();
        if (! is_array($toArray)) {
            $this->addError($errors, $model, 'AddressData toArray did not return array');

            return null;
        }

        /** @var array<string, string|int|float|bool|null> $updateData */
        $updateData = Arr::only($toArray, ['latitude', 'longitude']);

        if ([] === $updateData) { // Changed from empty($updateData)
            $this->addError($errors, $model, 'No latitude/longitude in geocoding result');

            return null;
        }

        return $updateData;
    }

    /**
     * Add an error to the errors collection.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     */
    private function addError(\Illuminate\Support\Collection $errors, Model $model, string $message): void
    {
        $modelName = $this->getModelName($model);
        $errors->push([
            'model' => $modelName,
            'error' => $message,
        ]);
    }

    /**
     * Get human-readable model name for error messages.
     */
    private function getModelName(Model $model): string
    {
        // Try common name attributes
        $nameAttributes = ['name', 'company_name', 'title', 'label', 'email'];

        foreach ($nameAttributes as $attr) {
            $value = $model->getAttribute($attr);
            if (is_string($value) && '' !== $value) {
                return $value;
            }
        }

        // Fallback to class name + ID
        $className = class_basename($model);
        $id = $model->getKey();
        $idString = is_scalar($id) ? (string) $id : 'unknown';

        return "{$className}#{$idString}";
    }
=======
use Modules\Geo\Models\Place;
use RuntimeException;
=======
>>>>>>> 0746367 (.)

/**
 * Update coordinates (latitude/longitude) for a collection of models.
 *
 * This action performs bulk geocoding using the GetAddressDataFromFullAddressAction
 * and updates each model with the retrieved coordinates.
 *
 * Features:
 * - Queueable for large batches
 * - Error tracking per model
 * - Configurable address attribute
 * - Type-safe with PHPStan Level 10
 *
 * Example usage:
 * ```php
 * $result = app(UpdateCoordinatesAction::class)->execute($clients);
 *
 * if ($result->isCompleteSuccess()) {
 *     // All coordinates updated
 * }
 * ```
 */
class UpdateCoordinatesAction
{
    use QueueableAction;

    /**
     * Execute bulk coordinate update.
     *
     * @param Collection<int, Model> $models           Collection of models to update
     * @param string                 $addressAttribute Attribute containing the full address
     *
     * @return UpdateCoordinatesResult Result with statistics and errors
     */
    public function execute(
        Collection $models,
        string $addressAttribute = 'full_address',
    ): UpdateCoordinatesResult {
        $geocodingAction = app(GetAddressDataFromFullAddressAction::class);

        $totalProcessed = 0;
        $successCount = 0;
        $failureCount = 0;
        /** @var \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors */
        $errors = collect();

        foreach ($models as $model) {
            $outcome = $this->processSingleModelAndCollectErrors($model, $addressAttribute, $geocodingAction, $errors);
            ++$totalProcessed;
            if (true === $outcome) {
                ++$successCount;
            } elseif (false === $outcome) {
                ++$failureCount;
            }
        }

        return new UpdateCoordinatesResult($totalProcessed, $successCount, $failureCount, $errors);
    }

    /**
     * Process a single model for coordinate update and collect errors.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return bool|null true for success, false for failure (error pushed), null for skipped model
     */
    private function processSingleModelAndCollectErrors(
        Model $model,
        string $addressAttribute,
        GetAddressDataFromFullAddressAction $geocodingAction,
        \Illuminate\Support\Collection $errors,
    ): ?bool {
        try {
            $fullAddress = $this->validateAddress($model, $addressAttribute, $errors);
            if (null === $fullAddress) {
                return null;
            }

            $addressData = $this->performGeocoding($fullAddress, $geocodingAction, $model, $errors);
            if (null === $addressData) {
                return false;
            }

            /** @var array<string, string|int|float|bool|null> $updateData */
            $updateData = $this->extractUpdateData($addressData, $model, $errors);
            if (null === $updateData) {
                return false;
            }

            $model->update($updateData);

            return true;
        } catch (\Throwable $e) {
            $this->addError($errors, $model, $e->getMessage());

            return false;
        }
    }

    /**
     * Validate and retrieve the full address from the model.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return string|null the full address on success, null on failure
     */
    private function validateAddress(Model $model, string $addressAttribute, \Illuminate\Support\Collection $errors): ?string
    {
        $fullAddress = $model->getAttribute($addressAttribute);
        if (! is_string($fullAddress) || '' === $fullAddress) {
            $this->addError($errors, $model, "Missing or invalid {$addressAttribute} attribute");

            return null;
        }

        return $fullAddress;
    }

    /**
     * Perform geocoding and validate the result.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return object|null the address data object on success, null on failure
     */
    private function performGeocoding(
        string $fullAddress,
        GetAddressDataFromFullAddressAction $geocodingAction,
        Model $model,
        \Illuminate\Support\Collection $errors,
    ): ?object {
        $addressData = $geocodingAction->execute($fullAddress);

        if (null === $addressData) {
            $geocodingErrors = $geocodingAction->errors;
            $errorMsg = $geocodingErrors->isNotEmpty()
                ? $geocodingErrors->join(', ')
                : 'Geocoding service returned no data';

            $this->addError($errors, $model, is_string($errorMsg) ? $errorMsg : 'Unknown error');

            return null;
        }

        return $addressData;
    }

    /**
     * Extract update data (latitude/longitude) from address data.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return array<string, string|int|float|bool|null>|null update data on success, null on failure
     */
    private function extractUpdateData(object $addressData, Model $model, \Illuminate\Support\Collection $errors): ?array
    {
        if (! method_exists($addressData, 'toArray')) {
            $this->addError($errors, $model, 'AddressData does not have toArray method');

            return null;
        }

        $toArray = $addressData->toArray();
        if (! is_array($toArray)) {
            $this->addError($errors, $model, 'AddressData toArray did not return array');

            return null;
        }

        /** @var array<string, string|int|float|bool|null> $updateData */
        $updateData = Arr::only($toArray, ['latitude', 'longitude']);

        if ([] === $updateData) { // Changed from empty($updateData)
            $this->addError($errors, $model, 'No latitude/longitude in geocoding result');

            return null;
        }

        return $updateData;
    }

    /**
     * Add an error to the errors collection.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     */
    private function addError(\Illuminate\Support\Collection $errors, Model $model, string $message): void
    {
        $modelName = $this->getModelName($model);
        $errors->push([
            'model' => $modelName,
            'error' => $message,
        ]);
    }
<<<<<<< HEAD
>>>>>>> 1bb689f (.)
=======

    /**
     * Get human-readable model name for error messages.
     */
    private function getModelName(Model $model): string
    {
        // Try common name attributes
        $nameAttributes = ['name', 'company_name', 'title', 'label', 'email'];

        foreach ($nameAttributes as $attr) {
            $value = $model->getAttribute($attr);
            if (is_string($value) && '' !== $value) {
                return $value;
            }
        }

        // Fallback to class name + ID
        $className = class_basename($model);
        $id = $model->getKey();
        $idString = is_scalar($id) ? (string) $id : 'unknown';

        return "{$className}#{$idString}";
    }
>>>>>>> 0746367 (.)
}
