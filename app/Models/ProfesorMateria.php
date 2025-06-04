<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorMateria extends Model
{
    /** @use HasFactory<\Database\Factories\ProfesorMateriaFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $table = 'profesor_materias';

    protected $fillable = [
        'profesores_id',
        'materias_id',
    ];

    public function profesor(){
        return $this->belongsTo(Profesor::class, 'profesores_id', 'id');
    }

    public function materia(){
        return $this->hasMany(Materia::class);
    }
}
