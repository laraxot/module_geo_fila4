<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
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
=======
=======
use Filament\Actions\Action;
>>>>>>> b93ef594b4 (.)
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
use Modules\Geo\Filament\Resources\AddressResource;
<<<<<<< HEAD


>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> b93ef594b4 (.)
=======
use Filament\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Geo\Filament\Resources\AddressResource;


>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)

class EditAddress extends XotBaseEditRecord
{
    protected static string $resource = AddressResource::class;

    /**
<<<<<<< HEAD
     * @return array<Action>
=======
<<<<<<< HEAD
     * @return array<Action>
=======
     * @return array<\Filament\Actions\Action>
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
     */
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
