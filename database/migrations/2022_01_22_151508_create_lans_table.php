<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('date_begin');
            $table->date('date_end');
            $table->boolean('covid_restrictions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lans');
    }
}
