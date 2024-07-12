<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PokemonController;

Route::controller(PokemonController::class)->group(function () {
    Route::get('/', 'list')->name('list');
    Route::get('/pokemon/{pokemon}', 'index')->name('index');
});
