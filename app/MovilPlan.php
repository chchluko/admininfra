<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovilPlan extends Model
{
    protected $fillable = [
        'lineatelefonica',
        'marcacioncorta', 'plantype_id',
        'cuentaasignada', 'serviciosadicionales',
        'costo', 'comentario', 'plazo',
        'fechadetermino', 'fechadeinicio'
    ];

    public function tipo()
    {
        return $this->belongsTo('App\PlanType','plantype_id','id');
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
