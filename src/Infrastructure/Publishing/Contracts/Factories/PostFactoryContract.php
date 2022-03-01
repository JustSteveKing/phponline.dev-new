<?php

declare(strict_types=1);

namespace Infrastructure\Publishing\Contracts\Factories;

use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface PostFactoryContract
{
    public function make(array $attributes): DataObjectContract;
}
