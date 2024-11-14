<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAuthenticated;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

// Ruta para listar usuarios

Route::get('/menu', [UsuarioController::class, 'index'])->name('usuario.menu');

// Rutas para crear y almacenar un nuevo usuario
Route::get('/create', [UsuarioController::class, 'create'])->name('usuario.create');
/*Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');*/

// Rutas para editar y actualizar un usuario
Route::get('/edit/{usuario}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/update/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

// Ruta para eliminar un usuario
Route::delete('/destroy/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

// Ruta para mostrar un usuario específico
Route::get('/show/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/creado', [UsuarioController::class, 'create'])->name('user.create');
Route::post('/usuario/creado', [UsuarioController::class, 'store'])->name('user.store');
Route::get('/usuario/update/{id}', [UsuarioController::class,'edit'])->name('user.update');
Route::post('/usuario/update', [UsuarioController::class,'update'])->name('user.update.data');
Route::get('/usuario/delete/{id}', [UsuarioController::class,'destroy'])->name('user.destroy');

Route::get('login', [AuthController::class, 'showLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function(){
    return view('home');
})->name('home');


Route::middleware([isAuthenticated::class])->group(function(){
    Route::get('/usuario/list', [UsuarioController::class,'list'])->name('user.list');
    // Rutas para productos tecnológicos
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Rutas para categorías de tecnología
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Rutas para marcas
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
    Route::get('brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Rutas para órdenes de compra
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    // Rutas para items de órdenes
    Route::get('orderitems', [OrderItemController::class, 'index'])->name('orderitems.index');
    Route::get('orderitems/create', [OrderItemController::class, 'create'])->name('orderitems.create');
    Route::post('orderitems', [OrderItemController::class, 'store'])->name('orderitems.store');
    Route::get('orderitems/{orderItem}', [OrderItemController::class, 'show'])->name('orderitems.show');
    Route::get('orderitems/{orderItem}/edit', [OrderItemController::class, 'edit'])->name('orderitems.edit');
    Route::put('orderitems/{orderItem}', [OrderItemController::class, 'update'])->name('orderitems.update');
    Route::delete('orderitems/{orderItem}', [OrderItemController::class, 'destroy'])->name('orderitems.destroy');
});

