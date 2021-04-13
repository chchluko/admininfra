<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nomina');
            $table->unsignedBigInteger('ubicacion_id');
            $table->unsignedBigInteger('support_id');
            $table->unsignedBigInteger('file_id')->nullable();
            $table->string('nombre');
            $table->string('area');
            $table->string('depto');
            $table->string('puesto');
            $table->string('inventario');
            $table->boolean('activo')->default(1);
            $table->text('condiciones')->nullable();
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('assigned_supports');
    }
}
