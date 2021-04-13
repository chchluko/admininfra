<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imei')->unique();
            $table->unsignedBigInteger('mark_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('movil_plan_id');
            $table->string('modelo');
            $table->string('noserie');
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('movils');
    }
}
