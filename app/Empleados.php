<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
//    protected $dateFormat = 'd m Y';

    protected $fillable = [
            "primer_apellido",
            "nombre",
            "segundo_apellido",
            "email",
            "puesto",
            "nacimiento",
            "domicilio"];

}
