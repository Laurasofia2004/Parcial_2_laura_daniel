<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participacion extends Pivot
{
    use HasFactory;

    protected $table = 'participaciones';

    protected $fillable = ['evento_id', 'organizador_id', 'rol'];
}
