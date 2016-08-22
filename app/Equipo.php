<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equiposp';
    protected $fillable = ['nombre', 'hardwareId', 'ubicacion', 'usuario', 'SN'];

    public function softwares()
    {
        return $this->belongsToMany('App\Software');
    }

    public function hardwares()
    {
        return $this->belongsToMany('App\Hardware');
    }
}
