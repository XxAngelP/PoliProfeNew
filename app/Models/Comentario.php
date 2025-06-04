<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;

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
