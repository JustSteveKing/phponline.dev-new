<?php

declare(strict_types=1);

namespace Domains\Publishing\Events;

use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PostWasCreated extends ShouldBeStored
{
    public function __construct(
        public readonly DataObjectContract $object,
    ) {}
}
