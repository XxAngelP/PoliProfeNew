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
    }
}
