<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccesorioController;
use App\Http\Middleware\AdminMiddleware;






Route::get('/', function () {
    return view('welcome');
});

// Ruta para listar usuarios
Route::get('/prueba', [UsuarioController::class, 'index'])->name('usuario.index');

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
Route::get('/usuario/list', [UsuarioController::class,'list'])->name('user.list');
Route::get('/usuario/update/{id}', [UsuarioController::class,'edit'])->name('user.update');
Route::post('/usuario/update', [UsuarioController::class,'update'])->name('user.update.data');
Route::get('/usuario/delete/{id}', [UsuarioController::class,'destroy'])->name('user.destroy');

Route::get('login', [AuthController::class, 'showLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');



Route::get('/product/created', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/created', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/list', [ProductController::class,'list'])->name('products.list');
Route::get('/product/show/{product}', [ProductController::class,'show'])->name('products.show');
Route::get('/product/update/{id}', [ProductController::class,'edit'])->name('products.update');
Route::post('/product/update', [ProductController::class,'update'])->name('products.update.data');
Route::get('/product/delete/{id}', [ProductController::class,'destroy'])->name('products.destroy');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('register', [RegisterController::class, 'showForm']);



Route::get('accesorios', [AccesorioController::class, 'index'])->name('accesorios.index');
Route::get('accesorios/create', [AccesorioController::class, 'create'])->name('accesorios.create');
Route::post('accesorios', [AccesorioController::class, 'store'])->name('accesorios.store');
Route::get('accesorios/{id}/edit', [AccesorioController::class, 'edit'])->name('accesorios.edit');
Route::put('accesorios/{id}', [AccesorioController::class, 'update'])->name('accesorios.update');
Route::delete('accesorios/{id}', [AccesorioController::class, 'destroy'])->name('accesorios.destroy');
// Ruta para mostrar el formulario de edición
Route::get('clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Ruta para manejar la actualización del cliente
Route::put('clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');



Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Ruta para el panel del usuario
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Ruta para el panel del administrador, protegida por el middleware 'admin'
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Otras rutas para la administración
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    });
});