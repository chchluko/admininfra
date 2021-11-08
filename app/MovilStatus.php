<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovilStatus extends Model
{
    protected $fillable = ['status'];

    public function movil()
    {
        return $this->hasMany('App\Movil','status_id','id');
    }
}
