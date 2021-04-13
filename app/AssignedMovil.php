<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedMovil extends Model
{
    protected $fillable = [
        'nomina', 'movil_id', 'comentario',
        'condiciones'    ];

    public function movil()
    {
        return $this->hasOne('App\Movil','id','movil_id');
    }

    public function plan()
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
}
