<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $guarded = ['id'];

    public function movil()
    {
        return $this->hasMany('App\Movil','warehouse_id','id');
    }
}
