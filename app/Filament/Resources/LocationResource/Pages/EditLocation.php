<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Resources\LocationResource\Pages;

<<<<<<< HEAD
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Modules\Geo\Filament\Resources\LocationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Webmozart\Assert\Assert;

class EditLocation extends XotBaseEditRecord
=======
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
<<<<<<< HEAD
<<<<<<< HEAD
// use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps; // Pacchetto non installato
=======
use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;
>>>>>>> bc26394 (.)
=======
// use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps; // Pacchetto non installato
>>>>>>> c942565 (.)
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Geo\Filament\Resources\LocationResource;
use Webmozart\Assert\Assert;

class EditLocation extends EditRecord
>>>>>>> be08416 (.)
{
<<<<<<< HEAD
<<<<<<< HEAD
    // use InteractsWithMaps; // Pacchetto non installato
=======
    use InteractsWithMaps;
>>>>>>> bc26394 (.)
=======
    // use InteractsWithMaps; // Pacchetto non installato
>>>>>>> c942565 (.)

    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        Assert::string($url = $this->getResource()::getUrl('index'));

        return $url;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //            LocationResource\Widgets\LocationMapTableWidget::class,
        ];
    }
}
