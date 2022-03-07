<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [PokemonController::class, 'login'])->name('home.spokemon');
Route::get('/pokemons', [PokemonController::class, 'index'])->name('home.pokemon');
Route::get('/pokemons/search', [PokemonController::class, 'index'])->name('pokemon.search');
Route::get('/pokemon/{id}', [PokemonController::class, 'read'])->name('read.pokemon');

