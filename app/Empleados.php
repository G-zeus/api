<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Empleados extends Model
{


    protected $fillable = [
        "primer_apellido",
        "nombre",
        "segundo_apellido",
        "email",
        "puesto",
        "nacimiento",
        "domicilio"];

    public function setPrimerApellidoAttribute($value){

        $this->attributes['primer_apellido'] = strtoupper($value);

    }

    public function setNacimientoAttribute($value){

        $this->attributes['nacimiento'] = (new Carbon($value))->format('Y/m/d');

    }

    public function setNombreAttribute($value){

        $this->attributes['nombre'] = strtoupper($value);

    }

    public function setSegundoApellidoAttribute($value){

        $this->attributes['segundo_apellido'] = strtoupper($value);

    }
    public function setEmailAttribute($value){

        $this->attributes['email'] = strtoupper($value);

    }
    public function setPuestoAttribute($value){

        $this->attributes['puesto'] = strtoupper($value);

    }
    public function setDomicilioAttribute($value){

        $this->attributes['domicilio'] = strtoupper($value);

    }


    public function getNacimientoAttribute($value)
    {
        return $this->attributes['nacimiento'] = (new Carbon($value))->format('d/m/Y');

    }


}


