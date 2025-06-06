<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificacionController extends Controller
{
    public function index(){
        $users = User::where('img_url','!=', null)->where('is_auth', false)->get();

        return view('moder.verificacion.index', compact('users'));
    }

    public function show(Request $request){
        $userId = $request->query('user');
        $user = User::find($userId);
        return view('moder.verificacion.show', compact('user'));
    }

    
    public function verificar(Request $request){
        $request->validate([
            'boleta' => ['required', 'string', 'max:10'],
            'confirmarBoleta' => ['required', 'string', 'max:10'],
        ]);

        if($request->boleta != $request->confirmarBoleta){
            return redirect()->back()->with('mensaje', 'Las boletas no coinciden')->with('type', 'error');
        }

        $user = User::find($request->id);      
        $user->boleta = $request->boleta;
        $user->is_auth  = true;
        $user->save();  

        return redirect('verificacion')->with('mensaje', 'Boleta verificada')->with('type', 'success');

    }

    public function rechazar(Request $request){
        $user = User::find($request->id);
        $user->img_url = null;
        $user->save();

        return redirect('verificacion')->with('mensaje', 'Boleta rechazada')->with('type', 'success');
    }
}
