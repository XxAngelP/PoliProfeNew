<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteQuj extends Model
{
    /** @use HasFactory<\Database\Factories\ReportesQujFactory> */
    use HasFactory;

    protected $table = 'reportes_qujs';

    protected $fillable = [
        'user_id',
        'queja_id',
        'txt_reporte',
    ];

    public function queja(){
        return $this->belongsTo(Queja::class,'queja_id','id');
    }
}
