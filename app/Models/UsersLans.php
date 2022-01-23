<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLans extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'lan_id',
        'type',
        'arrival_date',
        'departure_date',
        'type_of_arrival',
        'meal_info',
        'allergies',
        'comment',
        'wish_drinks',
        'wish_games',
        'kitchen_duties_thu_ev',
        'kitchen_duties_fri_mo',
        'kitchen_duties_fri_ev',
        'kitchen_duties_sat_mo',
        'kitchen_duties_sat_ev',
        'kitchen_duties_sun_mo',
        'league_descent_rebirth',
        'league_descent_3',
        'league_overload',
        'league_shootmania',
        'league_rocket_league',
        'league_csgo'
    ];
}
