<?php

declare(strict_types=1);

use App\Http\Livewire\Posts\CreateForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostStoredEvent;
use App\Models\User;

use Domains\Publishing\Events\PostWasCreated;
use JustSteveKing\StatusCode\Http;

use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('shows the create form', function () {
    $user = User::factory()->create();
    Post::factory(10)->create(['user_id' => $user->id]);

    auth()->loginUsingId($user->id);

    get(route('app:posts:create'))
        ->assertStatus(Http::OK)
        ->assertSee('Post Title')
        ->assertSee('Submit for moderation');

})->group('publishing');

it('can create a new post', function () {
    $category = Category::factory()->create();
    auth()->loginUsingId(User::factory()->create()->id);

    expect(Post::query()->count())->toEqual(0);

    Livewire::test(CreateForm::class)
        ->set([
            'title' => 'pest php',
            'category' => $category->id,
            'description' => 'pest PHP is awesome, prove me wrong',
            'content' => 'Here be content, pirates and dragons',
        ])->call('submit')->assertHasNoErrors();

    expect(Post::query()->count())->toEqual(1);
})->group('publishing');

it('triggers the aggregate root to store the event that a post was created', function () {
    $category = Category::factory()->create();
    auth()->loginUsingId(User::factory()->create()->id);

    expect(PostStoredEvent::query()->count())->toEqual(0);

    Livewire::test(CreateForm::class)
        ->set([
              'title' => 'pest php',
              'category' => $category->id,
              'description' => 'pest PHP is awesome, prove me wrong',
              'content' => 'Here be content, pirates and dragons',
          ])->call('submit')->assertHasNoErrors();

    expect(
        PostStoredEvent::query()->count()
    )->toEqual(1);
})->group('publishing');
