<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Widgets;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
use Filament\Widgets\Widget;

/**
 * Widget mappa temporaneamente disabilitato per migrazione Filament v4.
 * Il pacchetto Webbingbrasil\FilamentMaps non è compatibile con Filament v4.
 * <<<<<<< HEAD.
 *
 * =======
 *
 * >>>>>>> be08416 (.)
 *
 * @see https://github.com/webbingbrasil/filament-maps/issues
 */
class WebbingbrasilMap extends Widget
{
    protected string $view = 'geo::filament.widgets.webbingbrasil-map-stub';

<<<<<<< HEAD
=======
=======
use Webbingbrasil\FilamentMaps\Actions\ZoomAction;
use Webbingbrasil\FilamentMaps\Actions\CenterMapAction;
use Webbingbrasil\FilamentMaps\Actions;
use Webbingbrasil\FilamentMaps\Marker;
use Webbingbrasil\FilamentMaps\Widgets\MapWidget;
=======
use Filament\Widgets\Widget;
>>>>>>> b93ef594b4 (.)

/**
 * Widget mappa temporaneamente disabilitato per migrazione Filament v4.
 * Il pacchetto Webbingbrasil\FilamentMaps non è compatibile con Filament v4.
 * 
 * @see https://github.com/webbingbrasil/filament-maps/issues
 */
class WebbingbrasilMap extends Widget
{
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    protected string $view = 'geo::filament.widgets.webbingbrasil-map-stub';

>>>>>>> b93ef594b4 (.)
=======
use Webbingbrasil\FilamentMaps\Actions;
use Webbingbrasil\FilamentMaps\Marker;
use Webbingbrasil\FilamentMaps\Widgets\MapWidget;

class WebbingbrasilMap extends MapWidget
{
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    protected int|string|array $columnSpan = 2;

    protected bool $hasBorder = false;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
    /**
     * Determina se il widget può essere visualizzato.
     * Temporaneamente disabilitato per compatibilità Filament v4.
     */
    public static function canView(): bool
<<<<<<< HEAD
    {
        return false;
=======
<<<<<<< HEAD
    {
        return false;
=======
=======
>>>>>>> origin/develop
    public function getMarkers(): array
    {
        return [
            Marker::make('pos2')->lat(-15.7942)->lng(-47.8822)->popup('Hello Brasilia!'),
        ];
    }

    public function getActions(): array
    {
        return [
<<<<<<< HEAD
            ZoomAction::make(),
            CenterMapAction::make()->zoom(2),
        ];
>>>>>>> a12f125f4a (.)
=======
    {
        return false;
>>>>>>> b93ef594b4 (.)
=======
            Actions\ZoomAction::make(),
            Actions\CenterMapAction::make()->zoom(2),
        ];
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
    }
}
