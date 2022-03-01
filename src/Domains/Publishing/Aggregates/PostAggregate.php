<?php

declare(strict_types=1);

namespace Domains\Publishing\Aggregates;

use Domains\Publishing\Events\PostWasCreated;
use Domains\Publishing\Repositories\PostStoredEventsRepository;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;
use Spatie\EventSourcing\StoredEvents\Repositories\StoredEventRepository;

class PostAggregate extends AggregateRoot
{
    protected static bool $allowConcurrency = false;

    public function createPost(DataObjectContract $object): self
    {
        $this->recordThat(
            domainEvent: new PostWasCreated(
                object: $object,
            ),
        );

        return $this;
    }

    public function getStoredEventRepository(): StoredEventRepository
    {
        return app(PostStoredEventsRepository::class);
    }
}
