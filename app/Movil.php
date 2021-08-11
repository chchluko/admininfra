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

    public function scopeAsignada($query)
    {
        return $query->where('asignado','0');
    }

}
