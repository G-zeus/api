<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleados_skills extends Model
{
    protected $fillable = ['empleado_id', 'skill_id', 'calificacion'];
}
