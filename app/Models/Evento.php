<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'ubicacion'];

    public function organizadores()
    {
        return $this->belongsToMany(Organizador::class, 'participaciones')
                    ->withPivot('rol')
                    ->withTimestamps();
    }
}
