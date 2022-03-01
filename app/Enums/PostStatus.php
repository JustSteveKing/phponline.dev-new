<?php

declare(strict_types=1);

namespace App\Enums;

enum PostStatus: string
{
    /**
     * USER STATUSES
     */
    case DRAFT = 'draft';
    case MODERATE = 'moderate';
    case ARCHIVED = 'archived';

    /**
     * MODERATOR STATUSES
     */
    case PUBLISHED = 'published';
    case HIDDEN = 'hidden';
}
