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

/*Route::get('/', function () {
    return 'Bem vindo ao meu primeiro projeto laravel!';
});
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato',[\App\Http\Controllers\ContatoContoller::class, 'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoContoller::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}',[\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');


    // fornecedores
    Route::get('/fornecedor',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::post('/fornecedor/listar',[\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar',[\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/editar/{id}/{msg?}',[\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}',[\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    Route::get('/fornecedor/adicionar',[\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar',[\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    //produtos
    Route::resource('produto', \App\Http\Controllers\ProdutoController::class);

    Route::resource('produto-detalhe', \App\Http\Controllers\ProdutoDetalheController::class);

    Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
    Route::resource('pedido', \App\Http\Controllers\PedidoController::class);

    //Route::resource('pedido-produto', \App\Http\Controllers\PedidoProdutoController::class);

    Route::get('/pedido-produto/create/{pedido}',[\App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::get('/pedido-produto/store/{pedido}',[\App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido}',[\App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::fallback( function () {
    echo'Esta rota não existe,<a href="'.route('site.index').'">clique aqui</a> para ser redirecionado para a pagina principal';
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

