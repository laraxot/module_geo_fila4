<?php

declare(strict_types=1);

namespace Modules\Geo\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Geo\Models\Address;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to update coordinates for multiple addresses based on their full addresses.
 */
class UpdateClientCoordinatesBulkAction
{
    use QueueableAction;

    public function __construct(
        private readonly GetAddressDataFromFullAddressAction $getAddressDataFromFullAddressAction,
    ) {
    }

    /**
     * Execute the action to update coordinates for a collection of addresses.
     *
     * @param Collection<int, Address> $addresses
     *
     * @return array{success_count: int, error_messages: array<string>}
     */
    public function execute(Collection $addresses): array
    {
        $successCount = 0;
        $errorMessages = [];

        DB::transaction(function () use ($addresses, &$successCount, &$errorMessages) {
            foreach ($addresses as $address) {
                $fullAddress = is_string($address->full_address) ? $address->full_address : '';
                $addressData = $this->getAddressDataFromFullAddressAction->execute($fullAddress);

                if (null !== $addressData) {
                    /** @var array<string, string|int|float|bool|null> $toArray */
                    $toArray = $addressData->toArray();
                    /** @var array<string, string|int|float|bool|null> $up */
                    $up = Arr::only($toArray, ['latitude', 'longitude']);
                    $address->update($up);
                    ++$successCount;

                    continue;
                }

                $addressName = is_string($address->name) ? $address->name : 'Unknown';
                $errors = $this->getAddressDataFromFullAddressAction->getErrors();
                $errorMsg = $errors->isNotEmpty() ? $errors->implode(', ') : 'Errore sconosciuto';
                $errorMessages[] = "Errore per {$addressName}: {$errorMsg}";
            }
        });

        return [
            'success_count' => $successCount,
            'error_messages' => $errorMessages,
        ];
    }
}
