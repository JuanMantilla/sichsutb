<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hardware';
    protected $fillable = ['equipo_id','empresa', 'nombre'];

    public function equipos()
    {
        return $this->belongsToMany('App\Equipos');
    }
}
