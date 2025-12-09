<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

<<<<<<< HEAD
=======
use Override;
>>>>>>> be08416 (.)
use Modules\Xot\Providers\XotBaseEventServiceProvider;

class EventServiceProvider extends XotBaseEventServiceProvider
{
    public string $name = 'Geo';
<<<<<<< HEAD

=======
>>>>>>> be08416 (.)
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
    #[\Override]
=======
    #[Override]
>>>>>>> be08416 (.)
    protected function configureEmailVerification(): void
    {
    }
}
