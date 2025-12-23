<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

class ListAddresses extends XotBaseListRecords
{
    protected static string $resource = AddressResource::class;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
=======
     * @return array<Action>
=======
     * @return array<string, Action>
>>>>>>> 0746367 (.)
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            CreateAction::make(),
>>>>>>> 1bb689f (.)
=======
            'create' => CreateAction::make(),
>>>>>>> 0746367 (.)
        ];
    }
}
