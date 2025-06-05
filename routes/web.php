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

Route::middleware(['auth', 'role:moderador|administrador'])->group(function () {
    Route::get('/panel',function(){return view('moder.dashboard');});

    //Verificaciones
    Route::get('/verificacion',[VerificacionController::class,'index']);
    Route::get('/verificacion/show',[VerificacionController::class,'show']);

    //Reportes
    Route::get('/reporte',[ReportesController::class,'index']);
    Route::get('/reporte/show',[ReportesController::class,'show']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "Vista de admin";
    });
});

//Rutas para Moderadores

//Rutas para Administradores
require __DIR__.'/apis.php';

require __DIR__.'/auth.php';
