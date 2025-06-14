<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\QuejaController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\VerificacionController;
use App\Http\Controllers\VerificacionController as ControllersVerificacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function (Request $request) {
    return view('welcome',[
            'user' => $request->user(),
        ]); 
})->name('dashboard');

//Rutas publicas
Route::get('/academia', [PublicPagesController::class,'academia']);
Route::get('/profesor', [PublicPagesController::class,'profesor']);
Route::get('/profesores', [PublicPagesController::class,'profesores']);
Route::get('/materia', [PublicPagesController::class,'materia']);

//Rutas para Usuarios
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/comentario/create',[ComentarioController::class,'crear'] );
    Route::post('/comentario/create',[ComentarioController::class,'store'] );
    
    Route::get('/queja/create',[QuejaController::class,'crear'] );
    Route::post('/queja/create',[QuejaController::class,'store'] );

    Route::post('/reportar/store',[ReportesController::class,'store'] );
});

//Rutas para Moderadores
Route::middleware(['auth', 'role:moderador|administrador'])->group(function () {
    Route::get('/panel',function(){return view('moder.dashboard');});

    //Verificaciones
    Route::get('/verificacion',[VerificacionController::class,'index']);
    Route::get('/verificacion/show',[VerificacionController::class,'show']);

    Route::put('/verificacion/verificar',[VerificacionController::class,'verificar']);
    Route::put('/verificacion/rechazar',[VerificacionController::class,'rechazar']);

    //Reportes
    Route::get('/reporte',[ReportesController::class,'index']);
    Route::get('/reporte/show',[ReportesController::class,'show']);

    Route::put('/reporte/comentario/keep',[ReportesController::class,'comentario_keep']);
    Route::put('/reporte/comentario/disable',[ReportesController::class,'comentario_disable']);

    Route::put('/reporte/queja/keep',[ReportesController::class,'queja_keep']);
    Route::put('/reporte/queja/disable',[ReportesController::class,'queja_disable']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "Vista de admin";
    });
});

//Rutas para Administradores
require __DIR__.'/apis.php';

require __DIR__.'/auth.php';
