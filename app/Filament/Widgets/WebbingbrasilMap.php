<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
use Filament\Widgets\Widget;

/**
 * Widget mappa temporaneamente disabilitato per migrazione Filament v4.
 * Il pacchetto Webbingbrasil\FilamentMaps non è compatibile con Filament v4.
 *
 * @see https://github.com/webbingbrasil/filament-maps/issues
 */
class WebbingbrasilMap extends Widget
{
    protected string $view = 'geo::filament.widgets.webbingbrasil-map-stub';

<<<<<<< HEAD
=======
use Webbingbrasil\FilamentMaps\Actions\ZoomAction;
use Webbingbrasil\FilamentMaps\Actions\CenterMapAction;
use Webbingbrasil\FilamentMaps\Actions;
use Webbingbrasil\FilamentMaps\Marker;
use Webbingbrasil\FilamentMaps\Widgets\MapWidget;

class WebbingbrasilMap extends MapWidget
{
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    protected int|string|array $columnSpan = 2;

    protected bool $hasBorder = false;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c942565 (.)
    /**
     * Determina se il widget può essere visualizzato.
     * Temporaneamente disabilitato per compatibilità Filament v4.
     */
    public static function canView(): bool
    {
        return false;
<<<<<<< HEAD
=======
    public function getMarkers(): array
    {
        return [
            Marker::make('pos2')->lat(-15.7942)->lng(-47.8822)->popup('Hello Brasilia!'),
        ];
    }

    public function getActions(): array
    {
        return [
            ZoomAction::make(),
            CenterMapAction::make()->zoom(2),
        ];
>>>>>>> bc26394 (.)
=======
>>>>>>> c942565 (.)
    }
}
