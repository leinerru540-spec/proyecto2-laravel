<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'correo', 'telefono', 'empresa'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'cliente_id');
    }
}

