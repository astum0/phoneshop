<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function ()
{
    Route::get("/", "home")->name('home');
});

Route::prefix('/categories')->as('category.')->group(function()
{
    Route::get('/{id}/all', [ProductsController::class, 'showOrCategory'])->name('showOrCategory');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard-admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
