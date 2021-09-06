<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpsToLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->string('ipmanagment')->default('1.1.1.1');
            $table->string('ipmpls')->default('1.1.1.1');
            $table->string('ipfija')->default('1.1.1.1');
            $table->string('segmento')->default('0');
            $table->string('tamanompls')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('ipmanagment');
            $table->dropColumn('ipmpls');
            $table->dropColumn('ipfija');
            $table->dropColumn('segmento');
            $table->dropColumn('tamanompls');
        });
    }
}
