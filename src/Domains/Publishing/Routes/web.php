<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('app')->as('app:')->group(function () {
    Route::prefix('posts')->as('posts:')->group(function () {
        Route::get('create', App\Http\Controllers\Web\Backend\Posts\CreateController::class)->name('create');
        Route::get('{post:uuid}', App\Http\Controllers\Web\Backend\Posts\ShowController::class)->name('show');
    });
});
