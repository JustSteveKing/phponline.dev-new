<?php

declare(strict_types=1);

namespace Domains\Publishing\Providers;

use Domains\Publishing\Actions\CreateNewPost;
use Domains\Publishing\Actions\UpdatePost;
use Domains\Publishing\Factories\PostFactory;
use Domains\Publishing\Services\PostAggregateService;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Publishing\Contracts\Actions\CreatePostContract;
use Infrastructure\Publishing\Contracts\Actions\UpdatePostContract;
use Infrastructure\Publishing\Contracts\Factories\PostFactoryContract;
use Infrastructure\Publishing\Contracts\Services\PostAggregateServiceContract;

class PublishingServiceProvider extends ServiceProvider
{
    /**
     * @var array<class-string,class-string>
     */
    public $bindings = [
        CreatePostContract::class => CreateNewPost::class,
        PostFactoryContract::class => PostFactory::class,
        UpdatePostContract::class => UpdatePost::class,
        PostAggregateServiceContract::class => PostAggregateService::class,
    ];

    /**
     * @return void
     */
    public function register(): void
    {
        $this->loadRoutesFrom(
            path: __DIR__ . '/../Routes/web.php',
        );

        $this->app->register(
            EventSourcingServiceProvider::class,
        );
    }

    public function boot(): void
    {
        Bus::pipeThrough([]);
    }
}
