<?php

namespace App\Http\Controllers;

use App\Models\ReporteCom;
use App\Models\ReporteQuj;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(){
        $reportes_com = ReporteCom::with('comentario')->get();
        $reportes_quj = ReporteQuj::with('queja')->get();
        return view('moder.reportes.index',compact('reportes_com','reportes_quj'));
        // return $reportes_com;
    }

    public function store(Request $request){
        $user = $request->user();
        if($request->type == 'comentario'){
            $reporte = ReporteCom::where('user_id', $user->id)->where('comentario_id', $request->comentario_id)->first();
            if($reporte){
                return redirect('profesor?id='.$request->profesor_id)->with('mensaje', 'Ya tienes un reporte agregado a ese comentario')->with('type', 'error');
            }
            $request->validate([
                'comentario_id' => 'required|exists:comentarios,id',
                'txt_reporte' => 'required|string|max:255',
            ]);

            ReporteCom::create([ 
                'user_id' => $user->id,
                'comentario_id' => $request->comentario_id,
                'txt_reporte' => $request->txt_reporte,
            ]);
            return redirect('profesor?id='.$request->profesor_id)->with('mensaje', 'Reporte enviado')->with('type', 'success');
        }elseif($request->type == 'queja'){
            $reporte = ReporteQuj::where('user_id', $user->id)->where('queja_id', $request->queja_id)->first();
            if($reporte){
                return redirect('profesor?id='.$request->profesor_id)->with('mensaje', 'Ya tienes un reporte agregado a esa queja')->with('type', 'error');
            }
            $request->validate([
                'queja_id' => 'required|exists:quejas,id',
                'txt_reporte' => 'required|string|max:255',
            ]);
            ReporteQuj::create([
                'user_id' => $user->id,
                'queja_id' => $request->queja_id,
                'txt_reporte' => $request->txt_reporte,
            ]);
            return redirect('profesor?id='.$request->profesor_id)->with('mensaje', 'Reporte enviado')->with('type', 'success');
        }

    }

    public function disable(){}

    public function keep(){}


}
