<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clave');
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
        Schema::dropIfExists('phone_keys');
    }
}
