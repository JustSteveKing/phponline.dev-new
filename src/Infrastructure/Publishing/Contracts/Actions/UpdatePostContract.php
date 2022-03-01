<?php

declare(strict_types=1);

namespace Infrastructure\Publishing\Contracts\Actions;

use Illuminate\Database\Eloquent\Model;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface UpdatePostContract
{
    public function handle(DataObjectContract $object, int $identifier): Model;
}
