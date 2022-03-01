<?php

declare(strict_types=1);

namespace Domains\Publishing\Repositories;

use App\Models\PostStoredEvent;
use Spatie\EventSourcing\StoredEvents\Repositories\EloquentStoredEventRepository;

class PostStoredEventsRepository extends EloquentStoredEventRepository
{
    /**
     * @var string
     */
    protected string $storedEventModel;

    public function __construct() {
        parent::__construct();

        $this->storedEventModel = PostStoredEvent::class;
    }
}
