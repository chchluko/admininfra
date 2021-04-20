<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $fillable = ['extension','type_id','modelo','ubicacion_id','nomina','comentario'];

    public function ubicacion()
    {
        return $this->hasOne('App\Ubicacion','IDAREA','ubicacion_id');
    }

    public function tipo()
    {
        return $this->hasOne('App\ExtensionType','id','type_id');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }
}
