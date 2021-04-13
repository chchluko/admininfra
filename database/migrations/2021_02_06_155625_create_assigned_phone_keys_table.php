<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedPhoneKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_phone_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nomina');
            $table->unsignedBigInteger('phone_key_id');
            $table->string('clave');
            $table->text('alcance');
            $table->string('nombre');
            $table->string('area');
            $table->string('depto');
            $table->string('puesto');
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('assigned_phone_keys');
    }
}
