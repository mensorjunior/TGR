<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Admin\ProdutoController as AdminProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas públicas (não precisam de autenticação)
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/{slug}', [ProdutoController::class, 'show'])->name('produtos.show');

// Agrupamento de rotas de usuário autenticado
Route::middleware('auth')->group(function () {
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de carrinho
    Route::post('/carrinho/add', [CarrinhoController::class, 'add'])->name('carrinho.add');
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho/fechar', [CarrinhoController::class, 'fechar'])->name('carrinho.fechar');

    // Rotas de pedidos
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/{codigo}', [PedidoController::class, 'show'])->name('pedidos.show');
});

// Agrupamento de rotas de administrador
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('produtos', AdminProdutoController::class);
    // Movemos esta rota para o grupo de admin para maior consistência
    Route::post('/pedidos/{id}/status', [PedidoController::class, 'updateStatus'])->name('pedidos.updateStatus');
});

require __DIR__.'/auth.php';