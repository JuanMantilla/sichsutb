<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipo_software extends Model
{
    protected $table = 'equipo_software';
    protected $fillable = ['equipo_id', 'software_id'];
}
