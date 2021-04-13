<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovilPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movil_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plantype_id');
            $table->string('lineatelefonica');
            $table->string('cuentaasignada');
            $table->string('costo');
            $table->integer('plazo');
            $table->string('marcacioncorta');
            $table->string('serviciosadicionales');
            $table->text('comentario')->nullable();
            $table->datetime('fechadeinicio');
            $table->datetime('fechadetermino');
            $table->boolean('activo')->default(1);
            $table->boolean('asignado')->default(0);
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
        Schema::dropIfExists('movil_plans');
    }
}
