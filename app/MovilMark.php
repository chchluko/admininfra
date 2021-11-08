<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovilMark extends Model
{
    protected $fillable = ['marca'] ;

    public function movil()
    {
        return $this->hasMany('App\Movil','mark_id','id');
    }
}
