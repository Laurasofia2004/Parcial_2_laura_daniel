<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;

    protected $table = 'organizadores'; // Añade esta línea

    protected $fillable = ['nombre', 'apellido', 'email', 'telefono'];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'participaciones')
                    ->withPivot('rol')
                    ->withTimestamps();
    }
}
