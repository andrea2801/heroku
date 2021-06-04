<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'dni',
        'persona_contacto',
        'detalle',
        'tareas',
        'horas_asignadas',
        'tf_asignada',
        'tf_asignada2',
        'zona',

    ];

    public function zona(){
        return $this->belongsTo(Zona::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function evolutivos(){
        return $this->hasMany(Evolutivo::class);
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

}
