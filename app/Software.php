<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'softwaresp';
    protected $fillable = ['software_id', 'nombre', 'cantidad'];

    public function equipos()
    {
        return $this->belongsToMany('App\Equipo');
    }

}
