<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedMovil extends Model
{
    protected $fillable = [
        'nomina', 'movil_id', 'comentario',
        'condiciones'    ];

    public function imei()
    {
        return $this->hasOne('App\Movil','id','movil_id');
    }

    public function lineatelefonica()
    {
        return $this->belongsTo('App\MovilPlan','movil_plan_id','id');
    }

    public function nomina()
    {
        return $this->hasOne('App\Empleado','NOMINA','nomina');
    }

    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }

    public function getNOWAttribute()
    {
        return \Carbon\Carbon::now()->format('j').' de '.\Carbon\Carbon::now()->formatLocalized('%B').' del '.\Carbon\Carbon::now()->format('Y');
    }

    public function scopeActivo($query)
    {
        return $query->where('activo',1);
    }

    public function resource()
    {
        return $this->morphMany('App\Resource', 'resourceable');
    }

    public function scopeHistory($query, $activo)
    {
        if ($activo) {
            return $query->where('activo', $activo);
        }
    }
}
