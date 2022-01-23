<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id', false, true)->index('userReference');
            $table->bigInteger('lan_id', false, true)->index('lanReference');
            $table->enum('type', ['binding', 'interested', 'cancelled']);
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->boolean('kitchen_duties_thu_ev');
            $table->boolean('kitchen_duties_fri_mo');
            $table->boolean('kitchen_duties_fri_ev');
            $table->boolean('kitchen_duties_sat_mo');
            $table->boolean('kitchen_duties_sat_ev');
            $table->boolean('kitchen_duties_sun_mo');
            $table->enum('type_of_arrival', ['train_need_ride', 'train_no_ride', 'car_space', 'car_no_space', 'joining_other', 'unknown']);
            $table->enum('meal_info', ['omnivorous', 'vegetarian', 'vegan']);
            $table->boolean('allergies');
            $table->mediumText('comment');
            $table->boolean('league_descent_rebirth');
            $table->boolean('league_descent_3');
            $table->boolean('league_overload');
            $table->boolean('league_shootmania');
            $table->boolean('league_rocket_league');
            $table->boolean('league_csgo');
            $table->tinyText('wish_games');
            $table->tinyText('wish_drinks');

            $table->foreign('user_id', 'userReference')->references('id')->on('users');
            $table->foreign('lan_id', 'lanReference')->references('id')->on('lans');

            $table->unique(['user_id', 'lan_id'], 'uniqueLanPerUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_lans');
    }
}
