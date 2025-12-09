<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\AddressResource\Pages;

<<<<<<< HEAD
=======
use Override;
use Filament\Actions;
use Filament\Infolists\Infolist;
>>>>>>> be08416 (.)
use Modules\Geo\Filament\Resources\AddressResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewAddress extends XotBaseViewRecord
{
    protected static string $resource = AddressResource::class;

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    public function getInfolistSchema(): array
    {
        return [];
    }
}
