<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_verification', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true);
            $table->string('token');
            $table->timestamps();

            $table->foreign('user_id', 'userReferenceVerification')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_verification');
    }
}
