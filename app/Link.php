<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['anchodebanda','referencia','comentario','costo','provider_id',
    'type_id','status_id','ubicacion_id','plazo','fcontratacion'];

    public function provedor()
    {
        return $this->belongsTo('App\LinkProvider','provider_id','id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\LinkType','type_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\LinkStatus','status_id','id');
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

    public function getFcontratacionAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
