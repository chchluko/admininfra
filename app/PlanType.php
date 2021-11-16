<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanType extends Model
{
    protected $fillable = ['tipo'];

    public function planes()
    {
        return $this->hasMany('App\MovilPlan','plantype_id','id');
    }
}
