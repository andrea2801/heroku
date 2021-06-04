<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'fecha',
        'id_usuario',
        'id_tf',
    ];

}
