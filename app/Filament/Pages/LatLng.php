<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Pages;

use Modules\Geo\Filament\Widgets\LatLngWidget;
<<<<<<< HEAD
=======
use Modules\Geo\Filament\Widgets;
>>>>>>> be08416 (.)
use Modules\Xot\Filament\Pages\XotBasePage;

class LatLng extends XotBasePage
{
<<<<<<< HEAD
    public function getHeaderWidgetsColumns(): int|array
    {
        return 1;
    }

=======
>>>>>>> be08416 (.)
    protected function getHeaderWidgets(): array
    {
        return [
            LatLngWidget::class,
        ];
    }
<<<<<<< HEAD
=======

    public function getHeaderWidgetsColumns(): int|array
    {
        return 1;
    }
>>>>>>> be08416 (.)
}
