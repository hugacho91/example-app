<?php
use App\Http\Controllers\InstitucioneController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

/*Route::resource('/instituciones', App\Http\Controllers\InstitucioneController::class);
Route::resource('/expedientes', App\Http\Controllers\ExpedienteController::class);
Route::resource('/informe-fallas', App\Http\Controllers\InformeFallaController::class);
Route::resource('/solucion-fallas', App\Http\Controllers\SolucionFallaController::class);
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('/delegaciones', App\Http\Controllers\DelegacioneController::class);
Route::resource('/secciones', App\Http\Controllers\SeccioneController::class);*/



Route::resource('/users', App\Http\Controllers\UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
]);

Route::resource('/instituciones', App\Http\Controllers\InstitucioneController::class)->names([
    'index' => 'instituciones.index',
    'create' => 'instituciones.create',
    'store' => 'instituciones.store',
    'show' => 'instituciones.show',
    'edit' => 'instituciones.edit',
    'update' => 'instituciones.update',
    'destroy' => 'instituciones.destroy',
]);

Route::resource('/expedientes', App\Http\Controllers\ExpedienteController::class)->names([
    'index' => 'expedientes.index',
    'create' => 'expedientes.create',
    'store' => 'expedientes.store',
    'show' => 'expedientes.show',
    'edit' => 'expedientes.edit',
    'update' => 'expedientes.update',
    'destroy' => 'expedientes.destroy',
    'reporte' => 'expedientes.reporte',
]);

Route::resource('/informe-fallas', App\Http\Controllers\InformeFallaController::class)->names([
    'index' => 'informe-fallas.index',
    'create' => 'informe-fallas.create',
    'store' => 'informe-fallas.store',
    'show' => 'informe-fallas.show',
    'edit' => 'informe-fallas.edit',
    'update' => 'informe-fallas.update',
    'destroy' => 'informe-fallas.destroy',
]);

Route::resource('/solucion-fallas', App\Http\Controllers\SolucionFallaController::class)->names([
    'index' => 'solucion-fallas.index',
    'create' => 'solucion-fallas.create',
    'store' => 'solucion-fallas.store',
    'show' => 'solucion-fallas.show',
    'edit' => 'solucion-fallas.edit',
    'update' => 'solucion-fallas.update',
    'destroy' => 'solucion-fallas.destroy',
]);

Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class)->names([
    'index' => 'usuarios.index',
    'create' => 'usuarios.create',
    'store' => 'usuarios.store',
    'show' => 'usuarios.show',
    'edit' => 'usuarios.edit',
    'update' => 'usuarios.update',
    'destroy' => 'usuarios.destroy',
]);

Route::resource('/delegaciones', App\Http\Controllers\DelegacioneController::class)->names([
    'index' => 'delegaciones.index',
    'create' => 'delegaciones.create',
    'store' => 'delegaciones.store',
    'show' => 'delegaciones.show',
    'edit' => 'delegaciones.edit',
    'update' => 'delegaciones.update',
    'destroy' => 'delegaciones.destroy',
]);

Route::resource('/secciones', App\Http\Controllers\SeccioneController::class)->names([
    'index' => 'secciones.index',
    'create' => 'secciones.create',
    'store' => 'secciones.store',
    'show' => 'secciones.show',
    'edit' => 'secciones.edit',
    'update' => 'secciones.update',
    'destroy' => 'secciones.destroy',
]);

Route::resource('/roles', App\Http\Controllers\RoleController::class)->names([
    'index' => 'roles.index',
    'create' => 'roles.create',
    'store' => 'roles.store',
    'show' => 'roles.show',
    'edit' => 'roles.edit',
    'update' => 'roles.update',
    'destroy' => 'roles.destroy',
]);

Route::resource('/actividades', App\Http\Controllers\ActividadeController::class)->names([
    'index' => 'actividades.index',
    'create' => 'actividades.create',
    'store' => 'actividades.store',
    'show' => 'actividades.show',
    'edit' => 'actividades.edit',
    'update' => 'actividades.update',
    'destroy' => 'actividades.destroy',
]);


Route::post('/upload', 'ArchivoController@store')->name('archivo.store');
Route::get('archivos/{archivo}/ver', [ArchivoController::class, 'ver'])->name('archivos.ver');
Route::get('archivos/{archivo}/descargar', [ArchivoController::class, 'descargar'])->name('archivos.descargar');
Route::delete('archivos/{archivo}', [ArchivoController::class, 'eliminar'])->name('archivos.eliminar');

/*Route::resource('/delegacione', App\Http\Controllers\DelegacioneController::class);
Route::resource('/seccione', App\Http\Controllers\SeccioneController::class);*/
Route::resource('/actividade', App\Http\Controllers\ActividadeController::class);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');