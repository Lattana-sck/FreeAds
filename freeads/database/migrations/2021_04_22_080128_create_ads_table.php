<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->unsigned()->reference('id')->on('user')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('photo');
            $table->string('localisation');
            $table->integer('price');
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
        Schema::dropIfExists('ads');
    }
}
