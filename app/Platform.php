<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = ['provider_id','mark_id','status_id','type_id','ubicacion_id','modelo','noserie','vigenciagarantia','comentario'];

    public function provedor()
    {
        return $this->belongsTo('App\PlatformProvider','provider_id','id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\PlatformType','type_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\PlatformStatus','status_id','id');
    }

    public function marca()
    {
        return $this->belongsTo('App\PlatformMark','mark_id','id');
    }

    public function ubicacion()
    {
        return $this->hasOne('App\Ubicacion','IDAREA','ubicacion_id');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }

}
