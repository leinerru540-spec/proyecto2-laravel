<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultoria extends Model
{
    protected $table = 'consultorias';
    protected $fillable = ['descripcion', 'tipo'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'consultoria_id');
    }
}

