<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/animal_kinds', [\App\Http\Controllers\AnimalKindController::class, 'index'])->name('get-kinds');

Route::prefix('animals')->name('animals.')->group( function () {
    Route::get('/', [\App\Http\Controllers\AnimalController::class, 'index'])->name('get-all');
    Route::get('/{animal}', [\App\Http\Controllers\AnimalController::class, 'show'])->name('get-info');
    Route::post('/', [\App\Http\Controllers\AnimalController::class, 'create'])->name('create');
    Route::post('/age', [\App\Http\Controllers\AnimalController::class, 'update'])->name('update');
    Route::delete('/', [\App\Http\Controllers\AnimalController::class, 'deleteAll'])->name('delete-all');
});

