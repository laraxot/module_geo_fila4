<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

class ViewAddress extends XotBaseViewRecord
{
    protected static string $resource = AddressResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> 1bb689f (.)
=======
    #[\Override]
>>>>>>> 0746367 (.)
    public function getInfolistSchema(): array
    {
        return [];
    }
}
