<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\CreateAction;
=======
use Override;
use Filament\Actions\CreateAction;
use Filament\Actions;
>>>>>>> be08416 (.)
use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListAddresses extends XotBaseListRecords
{
    protected static string $resource = AddressResource::class;

    /**
     * @return array<Action>
     */
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
