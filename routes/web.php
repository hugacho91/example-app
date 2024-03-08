<?php
use App\Http\Controllers\InstitucioneController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('/instituciones', App\Http\Controllers\InstitucioneController::class);

require __DIR__.'/auth.php';


Route::resource('/ciudad', CiudadController::class);
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/instituciones', App\Http\Controllers\InstitucioneController::class);
Route::resource('/expedientes', App\Http\Controllers\ExpedienteController::class);
Route::resource('/informe-fallas', App\Http\Controllers\InformeFallaController::class);
Route::resource('/solucion-fallas', App\Http\Controllers\SolucionFallaController::class);
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::post('/upload', 'ArchivoController@store')->name('archivo.store');
Route::get('archivos/{archivo}/ver', [ArchivoController::class, 'ver'])->name('archivos.ver');
Route::get('archivos/{archivo}/descargar', [ArchivoController::class, 'descargar'])->name('archivos.descargar');
Route::delete('archivos/{archivo}', [ArchivoController::class, 'eliminar'])->name('archivos.eliminar');

