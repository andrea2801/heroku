<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Usuario;

class Zona extends Model
{
    use HasFactory;
    protected $fillable = [
        'zonas',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function usuario(){
        return $this->hasMany(Usuario::class);
    }
}
