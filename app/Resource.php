<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $guarded = ['id'];

    public function resourceable(){
        return $this->morphTo();
    }
}
