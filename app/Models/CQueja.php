<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CQueja extends Model
{
    /** @use HasFactory<\Database\Factories\CQuejaFactory> */
    use HasFactory;
    public $timestamps = false;

    protected $table = 'c_quejas';

}
