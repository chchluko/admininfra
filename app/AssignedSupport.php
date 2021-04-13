<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedSupport extends Model
{
    protected $fillable = [
        'nomina', 'ubicacion_id', 'comentario', 'support_id', 'file_id',
        'condiciones', 'comentario'
    ];

    public function ubicacion()
    {
        return $this->hasOne('App\Ubicacion','IDAREA','ubicacion_id');
    }

    public function soporte()
    {
        return $this->hasOne('App\Support','id','support_id');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }
}
