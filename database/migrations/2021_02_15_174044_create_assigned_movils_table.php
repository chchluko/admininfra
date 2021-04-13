<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedMovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_movils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nomina');
            $table->unsignedBigInteger('movil_id');
            $table->unsignedBigInteger('movil_plan_id');
            $table->unsignedBigInteger('file_id')->nullable();
            $table->string('nombre');
            $table->string('area');
            $table->string('depto');
            $table->string('puesto');
            $table->boolean('activo')->default(1);
            $table->text('condiciones')->nullable();
            $table->text('comentario')->nullable();
            $table->text('autorizacion')->nullable();
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
        Schema::dropIfExists('assigned_movils');
    }
}
