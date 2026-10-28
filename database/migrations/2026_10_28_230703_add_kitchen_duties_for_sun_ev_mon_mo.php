<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_lans', function (Blueprint $table) {
            $table->boolean('kitchen_duties_sun_ev')->after('kitchen_duties_sun_mo');
            $table->boolean('kitchen_duties_mon_mo')->after('kitchen_duties_sun_ev');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_lans', function (Blueprint $table) {
            $table->dropColumn('kitchen_duties_sun_ev');
            $table->dropColumn('kitchen_duties_mon_mo');
        });
    }
};
