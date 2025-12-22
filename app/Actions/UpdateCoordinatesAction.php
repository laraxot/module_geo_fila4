<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Geo\Datas\UpdateCoordinatesResult;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed

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
<<<<<<< HEAD
     * @param Collection<int, Model> $models Collection of models to update
     * @param string $addressAttribute Attribute containing the full address
=======
     * @param Collection<int, Model> $models           Collection of models to update
     * @param string                 $addressAttribute Attribute containing the full address
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
     *
     * @return UpdateCoordinatesResult Result with statistics and errors
     */
    public function execute(
        Collection $models,
<<<<<<< HEAD
        string $addressAttribute = 'full_address'
=======
        string $addressAttribute = 'full_address',
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
    ): UpdateCoordinatesResult {
        $geocodingAction = app(GetAddressDataFromFullAddressAction::class);

        $totalProcessed = 0;
        $successCount = 0;
        $failureCount = 0;
        /** @var \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors */
        $errors = collect();

        foreach ($models as $model) {
            $outcome = $this->processSingleModelAndCollectErrors($model, $addressAttribute, $geocodingAction, $errors);
<<<<<<< HEAD
            $totalProcessed++;
            if ($outcome === true) {
                $successCount++;
            } elseif ($outcome === false) {
                $failureCount++;
=======
            ++$totalProcessed;
            if (true === $outcome) {
                ++$successCount;
            } elseif (false === $outcome) {
                ++$failureCount;
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
            }
        }

        return new UpdateCoordinatesResult($totalProcessed, $successCount, $failureCount, $errors);
    }

    /**
     * Process a single model for coordinate update and collect errors.
     *
<<<<<<< HEAD
     * @param Model $model
     * @param string $addressAttribute
     * @param GetAddressDataFromFullAddressAction $geocodingAction
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     * @return bool|null True for success, false for failure (error pushed), null for skipped model.
=======
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return bool|null true for success, false for failure (error pushed), null for skipped model
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
     */
    private function processSingleModelAndCollectErrors(
        Model $model,
        string $addressAttribute,
        GetAddressDataFromFullAddressAction $geocodingAction,
<<<<<<< HEAD
        \Illuminate\Support\Collection $errors
    ): ?bool {
        try {
            $fullAddress = $this->validateAddress($model, $addressAttribute, $errors);
            if ($fullAddress === null) {
=======
        \Illuminate\Support\Collection $errors,
    ): ?bool {
        try {
            $fullAddress = $this->validateAddress($model, $addressAttribute, $errors);
            if (null === $fullAddress) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
                return null;
            }

            $addressData = $this->performGeocoding($fullAddress, $geocodingAction, $model, $errors);
<<<<<<< HEAD
            if ($addressData === null) {
=======
            if (null === $addressData) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
                return false;
            }

            /** @var array<string, string|int|float|bool|null> $updateData */
            $updateData = $this->extractUpdateData($addressData, $model, $errors);
<<<<<<< HEAD
            if ($updateData === null) {
=======
            if (null === $updateData) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
                return false;
            }

            $model->update($updateData);

            return true;
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
            $this->addError($errors, $model, $e->getMessage());

            return false;
        }
    }

    /**
     * Validate and retrieve the full address from the model.
     *
<<<<<<< HEAD
     * @param Model $model
     * @param string $addressAttribute
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     * @return string|null The full address on success, null on failure.
=======
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return string|null the full address on success, null on failure
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
     */
    private function validateAddress(Model $model, string $addressAttribute, \Illuminate\Support\Collection $errors): ?string
    {
        $fullAddress = $model->getAttribute($addressAttribute);
<<<<<<< HEAD
        if (! is_string($fullAddress) || $fullAddress === '') {
=======
        if (! is_string($fullAddress) || '' === $fullAddress) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
            $this->addError($errors, $model, "Missing or invalid {$addressAttribute} attribute");

            return null;
        }

        return $fullAddress;
    }

    /**
     * Perform geocoding and validate the result.
     *
<<<<<<< HEAD
     * @param string $fullAddress
     * @param GetAddressDataFromFullAddressAction $geocodingAction
     * @param Model $model
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     * @return object|null The address data object on success, null on failure.
=======
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return object|null the address data object on success, null on failure
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
     */
    private function performGeocoding(
        string $fullAddress,
        GetAddressDataFromFullAddressAction $geocodingAction,
        Model $model,
<<<<<<< HEAD
        \Illuminate\Support\Collection $errors
    ): ?object {
        $addressData = $geocodingAction->execute($fullAddress);

        if ($addressData === null) {
=======
        \Illuminate\Support\Collection $errors,
    ): ?object {
        $addressData = $geocodingAction->execute($fullAddress);

        if (null === $addressData) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
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
<<<<<<< HEAD
     * @param object $addressData
     * @param Model $model
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     * @return array<string, string|int|float|bool|null>|null Update data on success, null on failure.
=======
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
     *
     * @return array<string, string|int|float|bool|null>|null update data on success, null on failure
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
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

<<<<<<< HEAD
        if ($updateData === []) { // Changed from empty($updateData)
=======
        if ([] === $updateData) { // Changed from empty($updateData)
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
            $this->addError($errors, $model, 'No latitude/longitude in geocoding result');

            return null;
        }

        return $updateData;
    }

    /**
     * Add an error to the errors collection.
     *
     * @param \Illuminate\Support\Collection<int, array{model: string, error: string}> $errors
<<<<<<< HEAD
     * @param Model $model
     * @param string $message
=======
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
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
<<<<<<< HEAD
            if (is_string($value) && $value !== '') {
=======
            if (is_string($value) && '' !== $value) {
>>>>>>> f0257c6e44bf36cf89605a4070ebc29a378cd3ed
                return $value;
            }
        }

        // Fallback to class name + ID
        $className = class_basename($model);
        $id = $model->getKey();
        $idString = is_scalar($id) ? (string) $id : 'unknown';

        return "{$className}#{$idString}";
    }
}
