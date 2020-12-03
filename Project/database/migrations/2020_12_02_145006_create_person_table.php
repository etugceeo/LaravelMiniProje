<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('name');
            $table->integer('company_id')->unsigned();
            $table->string('surname');
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}
