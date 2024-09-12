<?php

use Illuminate\Support\Facades\Route;

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

//Rota da página inicial
Route::get('/', [App\Http\Controllers\InicioController::class, 'inicio'])->name('inicio');


// Rotas do cardápio
Route::prefix('/cardapio')->group(function () {
    Route::get('/burger', [App\Http\Controllers\CardapioController::class, 'cardapio_burg'])->name('cardapio_burg');
    Route::get('/burgerBatata', [App\Http\Controllers\CardapioController::class, 'cardapio_burg_batata'])->name('cardapio_burg_batata');
    Route::get('/entrada', [App\Http\Controllers\CardapioController::class, 'cardapio_entrada'])->name('cardapio_entrada');
    Route::get('/rango', [App\Http\Controllers\CardapioController::class, 'cardapio_rango'])->name('cardapio_rango');
    Route::get('/drink', [App\Http\Controllers\CardapioController::class, 'cardapio_drink'])->name('cardapio_drink');
});

Route::fallback([App\Http\Controllers\InicioController::class, 'inicio']);

//login do ADM
Route::get('/loginAdm', [App\Http\Controllers\LoginAdmController::class, 'login'])->name('loginAdm');
Route::post('/loginAdm', [App\Http\Controllers\LoginAdmController::class, 'autenticar'])->name('autenticar');


//Rota de adicionar cardápio
Route::get('/adicionar-cardapio', [App\Http\Controllers\GerenciaController::class, 'index'])->name('adicionar-cardapio');
Route::get('/lista-cardapio', [App\Http\Controllers\GerenciaController::class, 'listaCardapio'])->name('lista-cardapio');


//Rota do menu ADM
Route::get('/menuADM', [App\Http\Controllers\GerenciaController::class, 'menuADM'])->name('menuADM');
