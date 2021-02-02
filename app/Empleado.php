<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $connection = 'sqlsrv';
    protected $primaryKey = 'NOMINA';
    protected $table = "dbo.ASCOL";

    public function scopeActive($query)
	{
	    return $query->where('STATUS', 3);
    }

    public function getFullNameAttribute()
	{
	    return $this->NOMBRE.' '.$this->APELLIDOPATERNO.' '.$this->APELLIDOMATERNO;
	}
}
