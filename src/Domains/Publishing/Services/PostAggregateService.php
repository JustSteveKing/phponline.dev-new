<?php

declare(strict_types=1);

namespace Domains\Publishing\Services;

use Domains\Publishing\Aggregates\PostAggregate;
use Illuminate\Support\Str;
use Infrastructure\Publishing\Contracts\Services\PostAggregateServiceContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class PostAggregateService implements PostAggregateServiceContract
{
    public function createPost(DataObjectContract $object): void
    {
        PostAggregate::retrieve(
            uuid: Str::uuid()->toString(),
        )->createPost(
            object: $object,
        )->persist();
    }
}
