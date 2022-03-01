<?php

declare(strict_types=1);

namespace Domains\Publishing\Providers;

use Domains\Publishing\Handlers\PostHandler;
use Domains\Publishing\Reactors\EmailModerators;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class EventSourcingServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        Projectionist::addProjector(
            projector: PostHandler::class,
        );

        Projectionist::addReactor(
            EmailModerators::class,
        );
    }
}
