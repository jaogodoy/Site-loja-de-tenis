<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Middleware\IsAdmin;

// Rota da Página Inicial
Route::get('/', function () {
    return view('Home_template.index');
})->name('home');

// Rotas de Produto
Route::get('/homem', [ProdutoController::class, 'produtosMasculinos']);
Route::get('/mulher', [ProdutoController::class, 'produtosFemininos']);

// Rotas para Autenticação (Clientes)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rotas para Autenticação (Administradores)
Route::get('/register-admin', [AuthController::class, 'showRegisterAdminForm'])->name('register.admin');
Route::post('/register-admin', [AuthController::class, 'registerAdmin']);

Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.submit');

// Rotas protegidas para Cliente
Route::middleware('auth')->group(function () {
    Route::post('/carrinho/adicionar/{produto}', [CarrinhoController::class, 'adicionar'])->name('adicionar.carrinho');
    Route::get('/carrinho', [CarrinhoController::class, 'exibirCarrinho'])->name('exibir.carrinho');
    Route::post('/carrinho/remover/{produto}', [CarrinhoController::class, 'remover'])->name('remover.carrinho');
    Route::post('/carrinho/atualizar/{produto}', [CarrinhoController::class, 'atualizarQuantidade'])->name('atualizar.carrinho');

    Route::get('/finalizacao', function () {
        return view('Home_template.finalizacao');
    });

    Route::get('/pagamento', [PagamentoController::class, 'index'])->name('processar.pagamento');
    Route::post('/pagamento/finalizar', [PagamentoController::class, 'finalizar'])->name('pagamento.finalizar');

    Route::get('/pagamento/sucesso', function () {
        return view('Home_template.sucesso');
    })->name('pagamento.sucesso');

    Route::get('/pagamento/falha', function () {
        return view('Home_template.falha');
    })->name('pagamento.falha');
});

// Rotas protegidas para Admin
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view("Admintemplate.index");
    })->name('dashboard');

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria');
    Route::get("/categoria/exc/{id}", [CategoriaController::class, 'ExcluirCategoria'])->name('categoria_ex');
    Route::get("/categoria/upd/{id}", [CategoriaController::class, 'BuscarAlteracao'])->name('categoria_upd');

    Route::post('/categoria', [CategoriaController::class, 'IncluirCategoria']);
    Route::post('/categoria/upd', [CategoriaController::class, 'ExecutaAlteracao']);

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::post('/produtos', [ProdutoController::class, 'salvarNovoProduto'])->name('novo_produto');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'salvarAlterarProduto'])->name('produto_update');
    Route::get('/produtos/{produto}', [ProdutoController::class, 'detalhesProduto'])->name('produto_detalhes');
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produto_excluir');
});

// Rota para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

