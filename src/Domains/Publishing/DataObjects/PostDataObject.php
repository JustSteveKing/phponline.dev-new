<?php

declare(strict_types=1);

namespace Domains\Publishing\DataObjects;

use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class PostDataObject implements DataObjectContract
{
    public function __construct(
        protected readonly string $title,
        protected readonly string $description,
        protected readonly string $content,
        protected readonly int $category,
        protected readonly int $user,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'category_id' => $this->category,
            'user_id' => $this->user,
        ];
    }
}
