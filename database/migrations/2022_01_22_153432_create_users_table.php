<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('user_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('isadmin')->default(false);
            $table->enum('clan_tag', ['Do', 'OOTS', 'VEX', '']);
            $table->integer('age');
            $table->enum('country_code', ['AT', 'CH', 'DE', 'LU']);
            $table->string('zip', 5);
            $table->string('city');
            $table->boolean('show_zip_public')->default('0');
            $table->boolean('show_zip_registered')->default('0');
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
        Schema::dropIfExists('users');
    }
}
