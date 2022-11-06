<?php

use App\Http\Controllers\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', Post\IndexController::class)->name('homepage');

Route::group([
    'prefix' => 'posts/',
    'as' => 'posts.',
], function () {
    Route::get('/', Post\IndexController::class)->name('index');
    Route::get('/{post}', Post\ShowController::class)->name('show');
});
