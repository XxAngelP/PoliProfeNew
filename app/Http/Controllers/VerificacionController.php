<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificacionController extends Controller
{
    public function index(){
        $users = User::where('img_url','!=', null)->get();

        return view('moder.verificacion.index', compact('users'));
    }

    public function show(Request $request){
        $userId = $request->query('user');
        $user = User::find($userId);
        return view('moder.verificacion.show', compact('user'));
    }
}
