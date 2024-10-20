<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

    Route::get('/categoria', [ CategoriaController::class, 'index' ])->name('categoria');
    Route::get("/categoria/exc/{id}", [ CategoriaController::class, 'ExcluirCategoria' ])->name('categoria_ex');
    Route::get("/categoria/upd/{id}",[ CategoriaController::class, 'BuscarAlteracao' ])->name('categoria_upd');

    Route::post('/categoria', [ CategoriaController::class, 'IncluirCategoria' ]);
    Route::post('/categoria/upd', [ CategoriaController::class, 'ExecutaAlteracao' ]);

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index'); // Note que aqui o nome é 'produtos.index'
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
