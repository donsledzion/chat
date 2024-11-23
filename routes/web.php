<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

Route::get('/profile', [ProfileController::class, 'edit'])
    ->middleware(['auth'])
    ->name('profile.edit');

Route::put('/profile', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');
Route::patch('/profile', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');

Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('profile.destroy');

Route::put('/password', [ProfileController::class, 'updatePassword'])
    ->middleware(['auth'])
    ->name('password.update');
