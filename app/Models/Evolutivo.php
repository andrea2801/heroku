<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evolutivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_tf',
        'descripcion',
        'fecha_creacion'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function trabajadoras(){
        return $this->belongsTo(User::class);
    }
}
