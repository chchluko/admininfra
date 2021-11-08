<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
    protected $fillable = ['imei','mark_id','status_id','modelo','type_id',
    'noserie','comentario','movil_plan_id'];

    public function tipo()
    {
        return $this->belongsTo('App\MovilType','type_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\MovilStatus','status_id','id');
    }

    public function marca()
    {
        return $this->belongsTo('App\MovilMark','mark_id','id');
    }

    public function lineatelefonica()
    {
        return $this->hasOne('App\MovilPlan','id','movil_plan_id');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }

    public function scopeActivo($query)
    {
        return $query->where('activo',1);
    }


    public function scopeLibre($query)
    {
        return $query->where('asignado',0)->where('status_id',1);
    }

    public function scopeAsignado($query)
    {
        return $query->where('asignado',1)->where('status_id',2);
    }

    public function scopeMovil($query)
    {
        return $query->where('type_id','1');
    }

    public function scopeTablet($query)
    {
        return $query->where('type_id','2');
    }

  /*public function scopeDispositivo($query)
    {
        if (auth()->user()->hasRole('movil')) {
            return $query->where('type_id',1);
        }
        if (auth()->user()->hasRole('operacionmovil')) {
            return $query->where('type_id',2);
        }
    }*/
}
