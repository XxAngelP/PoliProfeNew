<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    /** @use HasFactory<\Database\Factories\QuejaFactory> */
    use HasFactory;

    protected $table = 'quejas';

    protected $fillable = [
        'users_id',
        'profesores_id',
        'c_queja_id',
        'comentario',
        'estatus',
    ];

    public function categoria(){
        return $this->belongsTo(CQueja::class, 'c_queja_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function profesor(){
        return $this->belongsTo(Profesor::class,'profesores_id','id');
    }
}
