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

Route::get('/login', function(){ return 'Login';})->name('site.login');

Route::middleware('autenticacao:ldap, visitante')->prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes';})->name('app.clintes');

    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
});

Route::fallback( function () {
    echo'Esta rota não existe,<a href="'.route('site.index').'">clique aqui</a> para ser redirecionado para a pagina principal';
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

