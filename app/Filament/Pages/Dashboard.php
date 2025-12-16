<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
<<<<<<< HEAD
    // protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';

    // protected string $view = 'geo::filament.pages.dashboard';
=======
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
=======
use Modules\Xot\Filament\Pages\XotBasePage;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Pages\XotBaseDashboard;
use Modules\Xot\Filament\Pages\XotBasePage;
=======
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Filament\Pages\XotBaseDashboard;
>>>>>>> a12f125f4a (.)
=======
use Modules\Xot\Filament\Pages\XotBaseDashboard;
use Modules\Xot\Filament\Pages\XotBasePage;
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)

class Dashboard extends XotBaseDashboard
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
>>>>>>> be08416 (.)

    protected string $view = 'geo::filament.pages.dashboard';
<<<<<<< HEAD
=======
=======
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'geo::filament.pages.dashboard';
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
>>>>>>> c24a803 (.)

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
}
