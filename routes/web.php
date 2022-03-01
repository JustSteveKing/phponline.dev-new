<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::as('pages:')->group(function () {
    Route::get('/', App\Http\Controllers\Web\Pages\HomePageController::class)->name('home');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'posts' => Post::query()->where('user_id', auth()->id())->get(),
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
