<?php

namespace App\Http\Controllers;

use App\Models\CQueja;
use App\Models\Profesor;
use Illuminate\Http\Request;

class QuejaController extends Controller
{
    public function crear(Request $request){
        $id = $request->query('id');
        $profesor = Profesor::find($id);
        $categorias = CQueja::get();

        return view('user.queja', compact('profesor','categorias'));
    }
}
