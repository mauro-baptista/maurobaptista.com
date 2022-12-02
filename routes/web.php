<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Post;
use App\Http\Controllers\Sitemap;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', Sitemap\IndexController::class)->name('sitemap.index');

Route::get('/', HomePageController::class)->name('homepage');
Route::group([
    'prefix' => 'posts/',
    'as' => 'posts.',
], function () {
    Route::get('/', Post\IndexController::class)->name('index');
    Route::get('/{post}', Post\ShowController::class)->name('show');
});
