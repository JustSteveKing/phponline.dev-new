<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignInitialRole
{
    /**
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->user->update([
            'role_id' => Role::query()
                ->where('name', 'member')
                ->first()->id,
        ]);
    }
}
