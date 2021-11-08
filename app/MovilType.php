<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovilType extends Model
{
    protected $fillable = ['tipo'];

    public function movil()
    {
        return $this->hasMany('App\Movil','type_id','id');
    }
}
