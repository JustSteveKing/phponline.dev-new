<?php

declare(strict_types=1);

namespace Domains\Publishing\Actions;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Publishing\Contracts\Actions\UpdatePostContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class UpdatePost implements UpdatePostContract
{
    public function handle(DataObjectContract $object, int $identifier): Model
    {
        $post = Post::query()->findOrFail($identifier);

        $post->update($object->toArray());

        return $post->refresh();
    }
}
