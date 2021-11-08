<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $guarded = ['id'];

    public function tipo()
    {
        return $this->belongsTo('App\ServerType','typesrv_id','id');
    }

    public function tipoplataforma()
    {
        return $this->belongsTo('App\PlatformType','tipo','id');
    }

    public function status()
    {
        return $this->belongsTo('App\PlatformStatus','status_id','id');
    }

    public function marca()
    {
        return $this->belongsTo('App\PlatformMark','mark_id','id');
    }

    public function datacenter()
    {
        return $this->belongsTo('App\Datacenter','center_id','id');
    }

    public function getFmantoAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function getVigsoporteAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }


    public function getVigsoportevalAttribute($value)
    {
        if ($this->status_id == 1) {
            return \Carbon\Carbon::parse($value)->format('d/m/Y');
        } else {
            return null;
        }
    }
}
