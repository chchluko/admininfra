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
        return $this->hasOne('App\MovilPlan','id','movil_plan_id');
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
}
