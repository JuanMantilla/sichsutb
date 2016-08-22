<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migraciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('softwaresP', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('software_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->string('nombre');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('softwaresP');
    }
}
