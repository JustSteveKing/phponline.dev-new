<?php

declare(strict_types=1);

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class PostBuilder extends Builder
{
    public function published(): self
    {
        return $this->whereNotNull('published_at');
    }
}
