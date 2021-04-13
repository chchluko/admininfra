<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $fillable = ['extension','extension_type_id','modelo','ubicacion_id','nomina'];

    public function ubicacion()
    {
        return $this->hasOne('App\Ubicacion','IDAREA','ubicacion_id');
    }

    public function tipo()
    {
        return $this->hasOne('App\ExtensionType','id','extension_type_id');
    }
}
