<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\DeliveryController;

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
Route::get('/home', [App\Http\Controllers\InicioController::class, 'inicio'])->name('inicio');

//Rota do sobre nós
Route::get('/sobre-nos', [App\Http\Controllers\InicioController::class, 'sobre_nos'])->name('sobre_nos');

// Rotas do cardápio
// Route::prefix('/cardapio')->group(function () {
//     Route::get('/burger', [App\Http\Controllers\CardapioController::class, 'cardapio_burg'])->name('cardapio_burg');
//     Route::get('/burgerBatata', [App\Http\Controllers\CardapioController::class, 'cardapio_burg_batata'])->name('cardapio_burg_batata');
//     Route::get('/entrada', [App\Http\Controllers\CardapioController::class, 'cardapio_entrada'])->name('cardapio_entrada');
//     Route::get('/rango', [App\Http\Controllers\CardapioController::class, 'cardapio_rango'])->name('cardapio_rango');
//     Route::get('/drink', [App\Http\Controllers\CardapioController::class, 'cardapio_drink'])->name('cardapio_drink');
// });

Route::get('/cardapio', [App\Http\Controllers\CardapioController::class, 'cardapio'])->name('cardapio');

Route::fallback([App\Http\Controllers\InicioController::class, 'inicio']);


//Rotas delivery
Route::prefix('/delivery')->group(function () {
    Route::get('/registro-usuario', [App\Http\Controllers\UsuarioController::class, 'registroUsuario'])->name('registro-usuario');
    Route::post('/registro-usuario', [App\Http\Controllers\UsuarioController::class, 'registrar'])->name('registrar-usuario');
    Route::get('/login', [App\Http\Controllers\UsuarioController::class, 'login'])->name('login_user');
    Route::post('/login', [App\Http\Controllers\UsuarioController::class, 'autenticarUsuario'])->name('autenticar-usuario');

    Route::middleware(['auth'])->group(function(){
        Route::post('/finalizar-pedido', [DeliveryController::class, 'finalizarPedido'])->name('finalizar-pedido');
        Route::get('/adicionar-endereco', [App\Http\Controllers\EnderecoController::class, 'adicionarEndereco'])->name('adicionar-endereco');
        Route::post('/adicionar-endereco', [App\Http\Controllers\EnderecoController::class, 'registroEndereco'])->name('registro-endereco');
        Route::get('/inicio', [App\Http\Controllers\DeliveryController::class, 'inicioDelivery'])->name('inicio-delivery');
        Route::get('/lista-endereco', [App\Http\Controllers\EnderecoController::class, 'listarEnderecos'])->name('lista-enderecos');
        Route::get('/editar-endereco/{id}', [App\Http\Controllers\EnderecoController::class, 'editarEndereco'])->name('editar-endereco');
        Route::put('/editar-endereco', [App\Http\Controllers\EnderecoController::class, 'atualizarEndereco'])->name('atualizar-endereco');
        Route::delete('/editar-endereco/{id}', [App\Http\Controllers\EnderecoController::class, 'deletarEndereco'])->name('deletar-endereco');
        Route::get('/modal-confirmacao', [App\Http\Controllers\DeliveryController::class, 'visualizarModal'])->name('modal-confirmacao');
    });
});


//Administração // Gerenciamento
Route::prefix('/adm')->group(function () {
    Route::get('/loginAdm/{erro?}', [App\Http\Controllers\LoginAdmController::class, 'loginAdm'])->name('loginAdm');
    Route::post('/loginAdm', [App\Http\Controllers\LoginAdmController::class, 'autenticar'])->name('autenticar');

    Route::middleware(['checkLoginAdm'])->group(function () {
        Route::get('/menuAdm', [App\Http\Controllers\GerenciaController::class, 'menuAdm'])->name('menuAdm');

        //Cardápio
        Route::get('/adicionar-cardapio', [App\Http\Controllers\GerenciaController::class, 'addCardapio'])->name('adicionar-cardapio');
        Route::get('/lista-cardapio', [App\Http\Controllers\GerenciaController::class, 'listaCardapio'])->name('lista-cardapio');
        Route::get('/editar-excluir-cardapio', [App\Http\Controllers\GerenciaController::class, 'listaCardapio'])->name('editar-excluir-cardapio');
        Route::get('/editar-cardapio/{id}', [App\Http\Controllers\GerenciaController::class, 'editaCardapio'])->name('editar-excluir-cardapio');

        //Usuários
        Route::get('/gerenciar-usuarios', [App\Http\Controllers\GerenciarUsuariosController::class, 'listarUsuarios'])->name('gerenciar-usuarios');
        Route::delete('/gerenciar-usuarios/{id}', [App\Http\Controllers\GerenciarUsuariosController::class, 'deletarUsuario'])->name('deletar-usuario');
        Route::get('/editar-usuario/{id}', [App\Http\Controllers\GerenciarUsuariosController::class, 'editarUsuario'])->name('editar-usuario');
        Route::put('/editar-usuario/{id}', [App\Http\Controllers\GerenciarUsuariosController::class, 'atualizarUsuario'])->name('atualizar-usuario');

        //Relatórios
        Route::get('/relatorio-pedidos', [App\Http\Controllers\RelatorioController::class, 'relatorioPedidos'])->name('relatorio-pedidos');
        Route::get('/resultado-relatorio-pedidos', [App\Http\Controllers\RelatorioController::class, 'gerarRelatorioPedidos'])->name('gerar-relatorio-pedidos');
        Route::get('/relatorio-reservas', [App\Http\Controllers\RelatorioController::class, 'relatorioReservas'])->name('relatorio-reservas');
        Route::get('/resultado-relatorio-reservas', [App\Http\Controllers\RelatorioController::class, 'gerarRelatorioReservas'])->name('gerar-relatorio-reservas');

        //Cozinha
        Route::get('/pedidos-cozinha', [App\Http\Controllers\PedidoCozinhaController::class, 'pedidoCozinha'])->name('pedidos-cozinha');
    });
});


//CRUD Cardápio
Route::prefix('/cardapio')->group(function () {
    Route::post('/adicionar', [CardapioController::class, 'adicionarProdutoCardapio'])->name('produto.adicionar');
    Route::delete('/excluir/{id}', [CardapioController::class, 'excluirProdutoCardapio'])->name('produto.excluir');
    Route::put('/editar/{id}', [CardapioController::class, 'editarProdutoCardapio'])->name('produto.editar');
});
