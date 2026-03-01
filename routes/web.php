<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\QrCancionController;

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


// La home ahora solo muestra el prólogo
Route::get('/', function () {
    return view('home');
})->name('home');

// Nueva ruta para el formulario de testimonios/comentarios
Route::get('/tu-maestro', function () {
    return view('comentarios.create');
})->name('comentarios.create');

Route::post('/comentarios/guardar', [ComentarioController::class, 'store'])->name('comentarios.store');

// Rutas de Pedidos
Route::get('/pedido', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedido.store');

// Ruta para activar comentarios desde el email
Route::get('/comentarios/activar/{id}/{token}', [ComentarioController::class, 'activar'])
    ->name('comentarios.activar');
    
// Usamos /q/ para que el QR sea más simple y rápido de leer
Route::get('/q/{slug}', [CancionController::class, 'redirigir'])->name('qr.direct');

// Ruta para descargar el QR individualmente pasando el ID
Route::get('/descargar-qr/{id}', [QrCancionController::class, 'crearqr'])->name('qr.descargar');

// Ruta para descargar el pack completo para la imprenta
Route::get('/descargar-todos-qrs', [QrCancionController::class, 'descargarZip'])->name('qr.zip');