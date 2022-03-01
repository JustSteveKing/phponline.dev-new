<?php

declare(strict_types=1);

namespace Infrastructure\Publishing\Contracts\Services;

use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface PostAggregateServiceContract
{
    public function createPost(DataObjectContract $object): void;
}
