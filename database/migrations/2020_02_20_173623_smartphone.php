<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Smartphone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartphones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('name');
            $table->integer('year');
            $table->string('chipset');
            $table->integer('mem_ram');
            $table->integer('mem_int');
            $table->boolean('mem_exp_boolean');
            $table->double('display');
            $table->integer('main_cam');
            $table->integer('selfie_cam');
            $table->integer('battery');
            $table->integer('price');
            $table->integer('antutu');
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
        Schema::drop('smartphones');
    }
}
