<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = [
        'correo_solicitante',
        'nombre_solicitante',
        'descripcion',
        'estado',
        'fecha',
        'cliente_id',
        'consultoria_id',
        'usuario_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function consultoria()
    {
        return $this->belongsTo(Consultoria::class, 'consultoria_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

