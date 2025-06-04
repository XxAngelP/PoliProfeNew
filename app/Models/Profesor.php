<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    /** @use HasFactory<\Database\Factories\ProfesorFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'fecha_nacimiento'
    ];

    protected $table = "profesores";

    public function academia(){
        return $this->belongsTo(Academia::class,'academias_id','id');
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class, 'profesores_id');
    }

    public function quejas(){
        return $this->hasMany(Queja::class, 'profesores_id');
    }

}
