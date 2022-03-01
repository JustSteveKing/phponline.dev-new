<?php

declare(strict_types=1);

namespace Domains\Publishing\Actions;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Publishing\Contracts\Actions\CreatePostContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class CreateNewPost implements CreatePostContract
{
    public function handle(DataObjectContract $object): Model
    {
        return Post::query()->create(
            attributes: $object->toArray(),
        );
    }
}
