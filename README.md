https://app.brmodeloweb.com/#!/publicview/66dc9ab90483211f074fc96d

image

image

CREATE DATABASE site_lojadetenis; USE site_lojadetenis;

CREATE TABLE Usuarios ( id_usuario INT PRIMARY KEY,
nome VARCHAR(n) NOT NULL,
email VARCHAR(n),
senha VARCHAR(n),
data_criacao DATE,
UNIQUE (nome) );

CREATE TABLE Produtos ( id_produto INT PRIMARY KEY,
nome_produto VARCHAR(n),
preco FLOAT,
quantidade_estoque INT,
data_adicao DATE,
);

CREATE TABLE Pedidos ( id_pedido INT PRIMARY KEY,
id_usuario INT,
data_pedido DATE,
);

CREATE TABLE Itens_Pedido ( id_item_pedido INT PRIMARY KEY,
id_pedido INT,
id_produto INT,
quantidade INT,
preco_unitario FLOAT,
);

ALTER TABLE Pedidos ADD FOREIGN KEY(id_usuario) REFERENCES Usuarios (id_usuario) ALTER TABLE Itens_Pedido ADD FOREIGN KEY(id_pedido) REFERENCES Pedidos (id_pedido) ALTER TABLE Itens_Pedido ADD FOREIGN KEY(id_produto) REFERENCES Produtos (id_produto)

Rotas // Auth routes Route::get('/register', [UserController::class, 'showRegisterForm']); Route::post('/register', [UserController::class, 'register']); Route::get('/login', [UserController::class, 'showLoginForm']); Route::post('/login', [UserController::class, 'login']); Route::post('/logout', [UserController::class, 'logout']);

// User Profile Route::get('/user/{id}', [UserController::class, 'showProfile']); Route::put('/user/{id}', [UserController::class, 'updateProfile']);

// Public product routes Route::get('/products', [ProductController::class, 'index']); // Lista todos os produtos Route::get('/products/{id}', [ProductController::class, 'show']); // Detalhes de um produto específico

// Admin product routes Route::get('/admin/products', [AdminProductController::class, 'index']); Lista produtos (admin) Route::get('/admin/products/create', [AdminProductController::class, 'create']); Exibe formulário para adicionar produto Route::post('/admin/products', [AdminProductController::class, 'store']); Adiciona produto ao banco de dados Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit']); Exibe formulário para editar produto Route::put('/admin/products/{id}', [AdminProductController::class, 'update']); Atualiza produto no banco de dados Route::delete('/admin/products/{id}', [AdminProductController::class, 'destroy']); Remove produto do banco de dados

// Cart routes Route::get('/cart', [CartController::class, 'showCart']); Exibe carrinho do usuário Route::post('/cart/add/{id}', [CartController::class, 'addToCart']); Adiciona item ao carrinho Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart']); Remove item do carrinho Route::post('/cart/update/{id}', [CartController::class, 'updateCart']); Atualiza quantidade de um item no carrinho

// Order routes Route::get('/orders', [OrderController::class, 'index']); Exibe pedidos do usuário Route::get('/orders/{id}', [OrderController::class, 'show']); Detalhes de um pedido específico Route::post('/orders', [OrderController::class, 'create']); Cria novo pedido Route::get('/checkout', [OrderController::class, 'checkout']); Exibe página de checkout

// Admin routes Route::get('/admin/orders', [AdminOrderController::class, 'index']); Lista pedidos (admin) Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show']); Detalhes de um pedido específico (admin) Route::get('/admin/users', [AdminUserController::class, 'index']); Lista usuários (admin) Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit']); Exibe formulário para editar usuário Route::put('/admin/users/{id}', [AdminUserController::class, 'update']); Atualiza informações de um usuário Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy']); Remove usuário

// Middlewares

Route::middleware('auth')->group(function() { });

Route::middleware('admin')->group(function() { });
