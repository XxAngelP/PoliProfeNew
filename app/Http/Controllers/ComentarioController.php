<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
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
        $comentario = Comentario::where('users_id', $user->id)->where('profesores_id', $request->profesores_id)->first();

        if($comentario){
            return redirect('profesor?id='.$request->profesores_id)->with('mensaje', 'Ya tienes un comentario agregado')->with('type', 'error');
        }

        $request->validate([
            'profesores_id' => ['required', 'numeric'],
            'materia_id' => ['required', 'numeric'],
            'r_dm' => ['required', 'numeric','max:5'],
            'r_ce' => ['required', 'numeric','max:5'],
            'r_mia' => ['required', 'numeric','max:5'],
            'r_oc' => ['required', 'numeric','max:5'],
            'r_ru' => ['required', 'numeric','max:5'],
            'r_drd' => ['required', 'numeric','max:5'],
            'r_ejr' => ['required', 'numeric','max:5'],
            'r_rte' => ['required', 'numeric','max:5'],
            'r_ra' => ['required', 'numeric','max:5'],
            'r_com' => ['required', 'string', 'max:255'],
        ]);


        Comentario::create([
            'users_id' => $user->id,
            'profesores_id' => $request->profesores_id,
            'materia_id' => $request->materia_id,
            'r_dm' => $request->r_dm,
            'r_ce' => $request->r_ce,
            'r_mia' => $request->r_mia,
            'r_oc' => $request->r_oc,
            'r_ru' => $request->r_ru,
            'r_drd' => $request->r_drd,
            'r_ejr' => $request->r_ejr,
            'r_rte' => $request->r_rte,
            'r_ra' => $request->r_ra,
            'r_com' => $request->r_com
        ]);

        return redirect('profesor?id='.$request->profesores_id)->with('mensaje', 'Mensaje Creado Correctamente')->with('type', 'success');
    }
}
