<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firewall extends Model
{
    protected $guarded = ['id'];

    public function tipoplataforma()
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

    public function datacenter()
    {
        return $this->belongsTo('App\Datacenter','center_id','id');
    }

    public function getVigsoporteAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
