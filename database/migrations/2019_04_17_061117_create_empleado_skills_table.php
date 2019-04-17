<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id');
//            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->integer('skill_id');
//            $table->foreign('skill_id')->references('id')->on('skills');
            $table->tinyInteger('calificacion');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_skills');
    }
}
