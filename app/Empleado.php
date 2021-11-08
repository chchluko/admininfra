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
        return $this->NOMBRE . ' ' . $this->APELLIDOPATERNO . ' ' . $this->APELLIDOMATERNO;
    }

    public function getNameAndNominaAttribute()
    {
    return $this->NOMBRE . ' ' . $this->APELLIDOPATERNO . ' ' . $this->APELLIDOMATERNO. ' (' . $this->NOMINA.')';
    }

    public function scopeBusqueda($query, $request)
    {
        if (trim($request->nombre) != '') {
            $query->Where(function ($query) use ($request) {
                $query->Where("NOMBRE", "like", "%$request->nombre%")
                    ->orWhere("APELLIDOPATERNO", "like", "%$request->nombre%")
                    ->orWhere("APELLIDOMATERNO", "like", "%$request->nombre%");
            });
        }
        return $query;
    }


    public function scopeBuscarpor($query, $tipo, $nombre)
    {
        if (($tipo) && ($nombre)) {
            $query->Where($tipo, "like", "%$nombre%");
        }
        return $query;
    }
}
