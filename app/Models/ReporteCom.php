<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteCom extends Model
{
    /** @use HasFactory<\Database\Factories\ReporteComFactory> */
    use HasFactory;

    protected $table = 'reportes_com';

    protected $fillable = [
        'user_id',
        'comentario_id',
        'txt_reporte',
    ];

    public function comentario(){
        return $this->belongsTo(Comentario::class,'comentario_id','id');
    }
}
