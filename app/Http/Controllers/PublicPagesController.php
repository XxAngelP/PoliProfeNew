<?php

namespace App\Http\Controllers;

use App\Models\Academia;
use App\Models\Comentario;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\Queja;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicPagesController extends Controller
{
    public function academia(Request $request){
        $id = $request->query('id');
        $profesores = Profesor::where('academias_id', $id)->with('academia')->get();
        $academia = Academia::find($id);
        $mensaje = 'Profesores de la Academia de '.$academia->nombre;
        return view('guess.profesor-lista', compact('profesores','academia','mensaje'));
    }

    public function profesor(Request $request){
        $r_dm = 0;
        $r_ce = 0;  
        $r_mia = 0; 
        $r_oc = 0;  
        $r_ru = 0;  
        $r_drd = 0; 
        $r_ejr = 0; 
        $r_rte = 0; 
        $r_ra = 0;  
        $id = $request->query('id');
        
        //DB::enableQueryLog();
        $profesor = Profesor::with(['comentarios', 'quejas'])->find($id);
        $comentarios = $profesor->comentarios;
        $quejas = $profesor->quejas;
        // $profesor = Profesor::find($id);
        // $comentarios = Comentario::where('profesores_id',$id)->get();
        // $quejas = Queja::where('profesores_id',$id)->get();
        //dd(DB::getQueryLog()); 

        $fechaNacimiento = $profesor->fecha_nacimiento; // Ejemplo de fecha desde la BD
        $hoy = new DateTime();
        $fechaNac = new DateTime($fechaNacimiento);
        $edad = $hoy->diff($fechaNac)->y;

        foreach($comentarios as $comentario){
            $r_dm += $comentario->r_dm;                    
            $r_ce += $comentario->r_ce;                    
            $r_mia += $comentario->r_mia;                    
            $r_oc += $comentario->r_oc;                    
            $r_ru += $comentario->r_ru;                    
            $r_drd += $comentario->r_drd;                    
            $r_ejr += $comentario->r_ejr;                    
            $r_rte += $comentario->r_rte;                    
            $r_ra += $comentario->r_ra;                  
        }

        $r_dm = $r_dm == 0 ? 0 : round($r_dm/count($comentarios));
        $r_ce = $r_ce == 0 ? 0 : round($r_ce/count($comentarios));
        $r_mia = $r_mia == 0 ? 0 : round($r_mia/count($comentarios));
        $r_oc = $r_oc == 0 ? 0 : round($r_oc/count($comentarios));
        $r_ru = $r_ru == 0 ? 0 : round($r_ru/count($comentarios));
        $r_drd = $r_drd == 0 ? 0 : round($r_drd/count($comentarios));
        $r_ejr = $r_ejr == 0 ? 0 : round($r_ejr/count($comentarios));
        $r_rte = $r_rte == 0 ? 0 : round($r_rte/count($comentarios));
        $r_ra = $r_ra == 0 ? 0 : round($r_ra/count($comentarios));

        return view('guess.profesor', compact('profesor','comentarios','quejas','r_dm','r_ce','r_mia','r_oc','r_ru','r_drd','r_ejr','r_rte','r_ra','edad'));
    }

    public function profesores(Request $request){
        $profesores = Profesor::where('nombre_completo', 'like', '%'.$request->query('nombre').'%')->with('academia')->get();
        $mensaje = 'Resultados de tu busqueda';
        return view('guess.profesor-lista', compact('profesores','mensaje'));
    }

    public function materia(Request $request){
        $id = $request->query('materia');
        $materia = Materia::find($id);
        $profesores = $materia->profesores;
        $mensaje = 'Profesores de la Materia de ' .$materia->nombre;
        return view('guess.profesor-lista', compact('profesores','mensaje'));

    }
}
