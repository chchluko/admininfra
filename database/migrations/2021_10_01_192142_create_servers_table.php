<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('mark_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('system_id');
            $table->unsignedBigInteger('arq_id');
            $table->unsignedBigInteger('typesrv_id');
            $table->boolean('activo')->default(1);
            $table->string('modelo')->nullable();
            $table->string('noserie')->nullable();
            $table->string('ip')->nullable();
            $table->string('rack')->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->string('rol')->nullable();
            $table->datetime('fmanto')->nullable();
            $table->datetime('vigsoporte')->nullable();
            $table->text('comentario')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('hd')->nullable();
            $table->string('hostname')->nullable();
            $table->string('vcn')->nullable();
            $table->string('compartment')->nullable();
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
        Schema::dropIfExists('servers');
    }
}
