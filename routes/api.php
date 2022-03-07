<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PokemonController;

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
Route::post('/auth/login', [AuthController::class, 'login']);
//Route::post('/register', [AuthController::class, 'register']);
//Route::get('/pokemons', [PokemonController::class, 'index']);
Route::get('/pokemon/{id}', [PokemonController::class, 'read']);

Route::middleware('api.user')->group( function () {
    Route::get('/pokemons', [PokemonController::class, 'index']);
    Route::get('/pokemons/search', [PokemonController::class, 'search']);
    //Route::get('/pokemon/{id}', [PokemonController::class, 'read']);
    Route::get('/pokemon/update/{id}', [PokemonController::class, 'update']);
});
