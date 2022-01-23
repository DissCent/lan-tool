<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lan;
use DateInterval;
use DateTime;
use App\Models\UsersLans;
use Illuminate\Support\Facades\Auth;

class LanEdit extends Component
{
    public $lan;
    public $lanname;
    public $landays = [];
    public $typeValues = [
        'Feste Zusage' => 'binding',
        'Interessiert' => 'interested',
        'Absage' => 'cancelled'
    ];
    public $typeOfArrivalValues = [
        'Anreise mit Auto (voll)' => 'car_no_space',
        'Anreise mit Auto (biete MFG)' => 'car_space',
        'Anreise per MFG' => 'joining_other',
        'Anreise mit Zug (brauche Abholung)' => 'train_no_ride',
        'Anreise mit Zug (ohne Abholung)' => 'train_need_ride',
        'Noch nicht bekannt' => 'unknown'
    ];
    public $mealInfoValues = [
        'Ich bin ein Allesesser' => 'omnivorous',
        'Ich esse vegetarisch' => 'vegetarian',
        'Ich esse vegan' => 'vegan'
    ];

    // form fields
    public $type;
    public $arrival;
    public $departure;
    public $type_of_arrival;
    public $meal_info;
    public $allergies;
    public $comment;
    public $wish_drinks;
    public $wish_games;
    public $kitchen_duties_thu_ev;
    public $kitchen_duties_fri_mo;
    public $kitchen_duties_fri_ev;
    public $kitchen_duties_sat_mo;
    public $kitchen_duties_sat_ev;
    public $kitchen_duties_sun_mo;
    public $league_descent_rebirth;
    public $league_descent_3;
    public $league_overload;
    public $league_shootmania;
    public $league_rocket_league;
    public $league_csgo;

    public function mount()
    {
        $this->lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];

        $begin = new DateTime($this->lan->date_begin);
        $end = new DateTime($this->lan->date_end);

        $this->arrival = $this->lan->date_begin;
        $this->departure = $this->lan->date_end;

        $this->landays[$begin->format('d.m.Y')] = $begin->format('Y-m-d');

        $begin->add(new DateInterval('P1D'));

        while ($begin <= $end) {
            $this->landays[$begin->format('d.m.Y')] = $begin->format('Y-m-d');
            $begin->add(new DateInterval('P1D'));
        }

        if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) > 0) {
            $lan = UsersLans::where('user_id', Auth::user()->id)
                ->where('lan_id', $this->lan->id)
                ->get()[0];

            $this->type = $lan->type;
            $this->arrival = $lan->arrival_date;
            $this->departure = $lan->departure_date;
            $this->type_of_arrival = $lan->type_of_arrival;
            $this->meal_info = $lan->meal_info;
            $this->allergies = $lan->allergies;
            $this->comment = $lan->comment;
            $this->wish_drinks = $lan->wish_drinks;
            $this->wish_games = $lan->wish_games;
            $this->kitchen_duties_thu_ev = $lan->kitchen_duties_thu_ev;
            $this->kitchen_duties_fri_mo = $lan->kitchen_duties_fri_mo;
            $this->kitchen_duties_fri_ev = $lan->kitchen_duties_fri_ev;
            $this->kitchen_duties_sat_mo = $lan->kitchen_duties_sat_mo;
            $this->kitchen_duties_sat_ev = $lan->kitchen_duties_sat_ev;
            $this->kitchen_duties_sun_mo = $lan->kitchen_duties_sun_mo;
            $this->league_descent_rebirth = $lan->league_descent_rebirth;
            $this->league_descent_3 = $lan->league_descent_3;
            $this->league_overload = $lan->league_overload;
            $this->league_shootmania = $lan->league_shootmania;
            $this->league_rocket_league = $lan->league_rocket_league;
            $this->league_csgo = $lan->league_csgo;
        }
    }

    public function render()
    {
        if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) == 0) {
            return '';
        }

        return view('livewire.lan-edit');
    }

    public function update()
    {
        $this->validate([
            'type' => 'required|string',
            'arrival' => 'required|string',
            'departure' => 'required|string',
            'type_of_arrival' => 'required|string',
            'meal_info' => 'required|string',
            'comment' => 'string',
            'wish_drinks' => 'string',
            'wish_games' => 'string'
        ]);

        if ($this->departure < $this->arrival) {
            $this->addError('departure', 'Abreise liegt vor der Anreise.');
            return;
        }

        $lan = UsersLans::where('user_id', Auth::user()->id)
            ->where('lan_id', $this->lan->id)
            ->get()[0];

        $lan->type = $this->type;
        $lan->arrival_date = $this->arrival;
        $lan->departure_date = $this->departure;
        $lan->type_of_arrival = $this->type_of_arrival;
        $lan->meal_info = $this->meal_info;
        $lan->allergies = $this->allergies;
        $lan->comment = $this->comment;
        $lan->wish_drinks = $this->wish_drinks;
        $lan->wish_games = $this->wish_games;
        $lan->kitchen_duties_thu_ev = $this->kitchen_duties_thu_ev;
        $lan->kitchen_duties_fri_mo = $this->kitchen_duties_fri_mo;
        $lan->kitchen_duties_fri_ev = $this->kitchen_duties_fri_ev;
        $lan->kitchen_duties_sat_mo = $this->kitchen_duties_sat_mo;
        $lan->kitchen_duties_sat_ev = $this->kitchen_duties_sat_ev;
        $lan->kitchen_duties_sun_mo = $this->kitchen_duties_sun_mo;
        $lan->league_descent_rebirth = $this->league_descent_rebirth;
        $lan->league_descent_3 = $this->league_descent_3;
        $lan->league_overload = $this->league_overload;
        $lan->league_shootmania = $this->league_shootmania;
        $lan->league_rocket_league = $this->league_rocket_league;
        $lan->league_csgo = $this->league_csgo;

        $lan->save();

        return redirect('/lanregister-done');
    }
}
