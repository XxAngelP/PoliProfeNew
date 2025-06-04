<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $table = 'materias';

    protected $fillable = ['nombre'];

    public function materiaProfesor(){
        return $this->hasMany(ProfesorMateria::class);
    }

    public function profesores(){
    return $this->belongsToMany(Profesor::class, 'profesor_materias', 'materias_id', 'profesores_id');
    }

}
