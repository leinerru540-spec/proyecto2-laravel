<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'usuario_id');
    }
}

