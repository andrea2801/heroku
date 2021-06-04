<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'dni',
        'password',
        'email',
        'img',
        'zona',
        'rol_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Role::class);
    }

    public function zona(){
        return $this->belongsTo(Zona::class);
    }

    public function usuario(){
        return $this->hasMany(Usuario::class);
    }

    public function evolutivos(){
        return $this->hasMany(Evolutivo::class);
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, "Non authorized action.");
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('rol', $role)->first()){
            return true;
        }
        return false;
    }
}
