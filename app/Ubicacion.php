<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $connection = 'sqlsrv';
    protected $primaryKey = 'IDAREA';
    protected $table = "dbo.ASUBICACION";

    public function getFullAddressAttribute()
    {
        return $this->ESTADO . ' ' . $this->MUNICIPIO . ' ' . $this->CP. ' ' . $this->COLONIA. ' ' . $this->CALLE. ' ' . $this->NUMEXT. ' ' . $this->NUMINT. ' ' . $this->CP;
    }

    public function scopeActive($query)
    {
        return $query->where('STATUS', 1);
    }
}
