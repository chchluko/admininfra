<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirewallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewalls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('mark_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('status_id');
            $table->boolean('activo')->default(1);
            $table->string('modelo')->nullable();
            $table->string('noserie')->nullable();
            $table->string('ip')->nullable();
            $table->string('rack')->nullable();
            $table->string('user')->nullable();
            $table->string('password')->nullable();
            $table->string('rol')->nullable();
            $table->datetime('vigsoporte')->nullable();
            $table->string('contact')->nullable();
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
        Schema::dropIfExists('firewalls');
    }
}
