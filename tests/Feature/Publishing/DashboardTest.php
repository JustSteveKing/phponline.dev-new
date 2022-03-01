<?php

declare(strict_types=1);

use App\Models\Post;
use App\Models\User;

use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\get;

it('can show a list of posts on the dashboard', function () {
    $user = User::factory()->create();
    $posts = Post::factory(10)->create(['user_id' => $user->id]);
    auth()->loginUsingId($user->id);

    get(
        route('dashboard'),
    )->assertStatus(Http::OK)->assertSee($posts->first()->title);
});
