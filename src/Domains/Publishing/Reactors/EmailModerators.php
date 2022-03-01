<?php

declare(strict_types=1);

namespace Domains\Publishing\Reactors;

use App\Models\User;
use App\Notifications\Moderation\NewPostWasCreated;
use Domains\Publishing\Events\PostWasCreated;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class EmailModerators extends Reactor implements ShouldQueue
{
    public function onPostWasCreated(PostWasCreated $event): void
    {
        $users = User::query()->whereHas('role', fn (Builder $builder) =>
            $builder->whereIn('name', ['moderator', 'admin']),
        )->get();

        $users->each( fn(Authenticatable $user) =>
            $user->notify(new NewPostWasCreated()),
        );
    }
}
