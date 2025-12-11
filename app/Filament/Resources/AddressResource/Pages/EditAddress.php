<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
=======
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
>>>>>>> be08416 (.)
use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
<<<<<<< HEAD
=======
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Geo\Filament\Resources\AddressResource;


>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)

class EditAddress extends XotBaseEditRecord
{
    protected static string $resource = AddressResource::class;

    /**
     * @return array<Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> bc26394 (.)
=======
}
>>>>>>> c942565 (.)
