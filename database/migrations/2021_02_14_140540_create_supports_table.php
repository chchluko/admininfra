<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inventario')->unique();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('mark_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('owner_id');
            $table->string('inventarioti');
            $table->string('modelo');
            $table->string('noserie');
            $table->text('comentario')->nullable();
            $table->datetime('fechadecompra');
            $table->datetime('vigenciagarantia');
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
        Schema::dropIfExists('supports');
    }
}
