<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;

    protected $fillable = [
        'users_id',
        'profesores_id',
        'materia_id',
        'r_dm',
        'r_ce',
        'r_mia',
        'r_oc',
        'r_ru',
        'r_drd',
        'r_ejr',
        'r_rte',
        'r_ra',
        'r_com',
    ];

    protected $table = 'comentarios';


    public function materia(){
        return $this->belongsTo(Materia::class,'materia_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function profesor(){
        return $this->belongsTo(Profesor::class,'profesores_id','id');
    }
}
