<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedPhoneKey extends Model
{
    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }
}
