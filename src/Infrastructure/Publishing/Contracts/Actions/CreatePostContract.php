<?php

namespace Infrastructure\Publishing\Contracts\Actions;

use Illuminate\Database\Eloquent\Model;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface CreatePostContract
{
    public function handle(DataObjectContract $object): Model;
}
