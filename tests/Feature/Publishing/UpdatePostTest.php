<?php

declare(strict_types=1);

use App\Http\Livewire\Posts\UpdateForm;
use App\Models\Post;
use App\Models\User;
use JustSteveKing\StatusCode\Http;

use Livewire\Livewire;

use function Pest\Laravel\get;

it('shows the update form', function () {
    auth()->loginUsingId(User::factory()->create()->id);

    $post = Post::factory()->create();

    get(
        route('app:posts:show', $post->uuid)
    )->assertStatus(Http::OK)->assertSee($post->title);
})->group('publishing');

it('can update a post', function (string $string) {
    auth()->loginUsingId(User::factory()->create()->id);
    $post = Post::factory()->create();

    Livewire::test(UpdateForm::class, ['post' => $post])
        ->set([
            'title' => $string,
            'description' => $string,
            'content' => $string,
            'category' => $post->category_id,
        ])->call('submit')->assertHasNoErrors();

    expect($post->refresh())->title->toEqual($string);

})->with('strings')->group('publishing');
