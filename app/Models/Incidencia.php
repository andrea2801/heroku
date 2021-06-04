<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'descripcion',
        'estado',
        'id_usuario',
        'id_tf',
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function trabajadoras(){
        return $this->belongsTo(User::class);
    }
}
