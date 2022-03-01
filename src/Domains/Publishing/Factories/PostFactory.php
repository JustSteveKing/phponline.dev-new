<?php

declare(strict_types=1);

namespace Domains\Publishing\Factories;

use Domains\Publishing\DataObjects\PostDataObject;
use Infrastructure\Publishing\Contracts\Factories\PostFactoryContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class PostFactory implements PostFactoryContract
{
    public function make(array $attributes): DataObjectContract
    {
        return new PostDataObject(
            title:       strval(data_get($attributes, 'title')),
            description: strval(data_get($attributes, 'description')),
            content:     strval(data_get($attributes, 'content')),
            category:    intval(data_get($attributes, 'category')),
            user:        intval(data_get($attributes, 'user_id')),
        );
    }
}
