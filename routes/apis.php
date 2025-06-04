<?php

use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/buscar-materia', function (Request $request) {
    $query = $request->input('query'); 
    $materias = Materia::where('nombre', 'LIKE', "%{$query}%")->get();
    return response()->json($materias);
});
Route::get('/buscar-maestro', function (Request $request) {
    $query = $request->input('query'); 
    $profesores = Profesor::where('nombre_completo', 'LIKE', "%{$query}%")->get();
    return response()->json($profesores);
});