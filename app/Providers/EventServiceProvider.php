<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

use Modules\Xot\Providers\XotBaseEventServiceProvider;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)

class EventServiceProvider extends XotBaseEventServiceProvider
{
    public string $name = 'Geo';

    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0746367 (.)
    #[\Override]
    protected function configureEmailVerification(): void
    {
    }
<<<<<<< HEAD
=======
    #[Override]
    protected function configureEmailVerification(): void {}
>>>>>>> 1bb689f (.)
=======
>>>>>>> 0746367 (.)
}
