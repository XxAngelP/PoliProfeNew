<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function crear(Request $request){
        $id = $request->query('id');
        $profesor = Profesor::find($id);
        $materias = Materia::get();
        
        return view('user.comentario',compact('profesor','materias'));
    }
    
    public function store(Request $request){
        $user = $request->user();
    }
}
