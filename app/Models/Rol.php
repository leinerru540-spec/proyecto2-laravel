<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre', 'descripcion'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_id');
    }
}
