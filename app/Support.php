<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = ['comentario','inventario','inventarioti','noserie','modelo','provider_id',
    'type_id','status_id','mark_id','owner_id','vigenciagarantia','fechadecompra'];


    public function provedor()
    {
        return $this->belongsTo('App\SupportProvider','provider_id','id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\SupportType','type_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\SupportStatus','status_id','id');
    }

    public function marca()
    {
        return $this->belongsTo('App\SupportMark','mark_id','id');
    }

    public function owner()
    {
        return $this->belongsTo('App\SupportOwner','owner_id','id');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }

    public function scopeAsignada($query)
    {
        return $query->where('asignado','0');
    }

}
