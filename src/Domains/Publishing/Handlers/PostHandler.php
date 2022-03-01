<?php

declare(strict_types=1);

namespace Domains\Publishing\Handlers;

use Domains\Publishing\Events\PostWasCreated;
use Infrastructure\Publishing\Contracts\Actions\CreatePostContract;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PostHandler extends Projector
{
    public function onPostWasCreated(PostWasCreated $event): void
    {
        /**
         * @var CreatePostContract
         */
        $action = resolve(CreatePostContract::class);

        $action->handle($event->object);
    }
}
