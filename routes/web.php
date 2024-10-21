<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
=======
>>>>>>> 447db2af698af04299cd360d8baf266de0890add

    Route::get('/categoria', [ CategoriaController::class, 'index' ])->name('categoria');
    Route::get("/categoria/exc/{id}", [ CategoriaController::class, 'ExcluirCategoria' ])->name('categoria_ex');
    Route::get("/categoria/upd/{id}",[ CategoriaController::class, 'BuscarAlteracao' ])->name('categoria_upd');

    Route::post('/categoria', [ CategoriaController::class, 'IncluirCategoria' ]);
    Route::post('/categoria/upd', [ CategoriaController::class, 'ExecutaAlteracao' ]);

<<<<<<< HEAD
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
=======
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index'); // Note que aqui o nome é 'produtos.index'
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
Route::post('/produtos', [ProdutoController::class, 'salvarNovoProduto'])->name('novo_produto');
Route::put('/produtos/{produto}', [ProdutoController::class, 'salvarAlterarProduto'])->name('produto_update');
Route::get('/produtos/{produto}', [ProdutoController::class, 'detalhesProduto'])->name('produto_detalhes');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produto_excluir');






Route::get('/adminn', function () {
    return view('Admintemplate.admin');
});

Route::get('/loginadmin', function () {
    return view('Admintemplate.adminlogin');
});


<<<<<<< HEAD
Route::get('/lojajg', [ProdutoController::class, 'produtostotal'])->name('lojajg');
Route::get('/jgstore', function () {return view('Home_template.index');});
Route::get('/homem', [ProdutoController::class, 'produtosMasculinos']);
Route::get('/mulher', [ProdutoController::class, 'produtosFemininos']);
Route::get('/carrinho', function () {return view('Home_template.Carrinho');});
Route::get('/finalizacao', function () {return view('Home_template.finalizacao');});



Route::post('/adicionar-ao-carrinho/{id}', [CartController::class, 'addToCart'])->name('adicionar.carrinho');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/remover-do-carrinho/{id}', [CartController::class, 'removeFromCart'])->name('remover.carrinho');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


=======

Route::get('/inicial', function () {
    return view('Hometemplate.home_template');
});

Route::get('/login', function () {
    return view('Hometemplate.homelogin');
});

Route::get('/register', function () {
    return view('Hometemplate.homeregister');
});

Route::get('/homem', function () {
    return view('Hometemplate.homem');
});
>>>>>>> 447db2af698af04299cd360d8baf266de0890add
