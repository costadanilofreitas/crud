<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstruturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estruturas', function (Blueprint $table){
            $table->increments('id');
            $table->string('codigo_pai', 15)->unasigned();
            $table->foreign('codigo_pai')->references('codigo')->on('produtos');
            $table->string('codigo_filho', 15)->unasigned();
            $table->foreign('codigo_filho')->references('codigo')->on('produtos');
            $table->float('quantidade', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estruturas');
    }
}
