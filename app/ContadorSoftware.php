<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContadorSoftware extends Model
{
    protected $table = 'contadorSoftware';
    protected $fillable = ['nombre', 'cantidad'];
}
