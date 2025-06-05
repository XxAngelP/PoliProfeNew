<?php

namespace App\Http\Controllers;

use App\Models\CQueja;
use App\Models\Profesor;
use App\Models\Queja;
use Illuminate\Http\Request;

class QuejaController extends Controller
{
    public function crear(Request $request){
        $id = $request->query('id');
        $profesor = Profesor::find($id);
        $categorias = CQueja::get();

        return view('user.queja', compact('profesor','categorias'));
    }

    public function store(Request $request){
        $user = $request->user();
        $queja = Queja::where('users_id', $user->id)->where('profesores_id', $request->profesores_id)->first();

        if($queja){
            return redirect('profesor?id='.$request->profesores_id)->with('mensaje', 'Ya tienes una queja agregada')->with('type', 'error');
        }

        $request->validate([
            'profesores_id' => ['required', 'numeric'],
            'c_queja_id' => ['required', 'numeric'],
            'comentario' => ['required', 'string', 'max:255'],
        ]);

        Queja::create([
            'users_id' => $user->id,
            'profesores_id' => $request->profesores_id,
            'c_queja_id' => $request->c_queja_id,
            'comentario' => $request->comentario,
        ]);

        return redirect('profesor?id='.$request->profesores_id)->with('mensaje', 'Queja enviada')->with('type', 'success');
    }
}
