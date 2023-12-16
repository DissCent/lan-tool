<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lan;
use DateInterval;
use DateTime;
use App\Models\UsersLans;
use Illuminate\Support\Facades\Auth;

class LanRegistration extends Component
{
    public $lan;
    public $lanname;
    public $landays = [];
    public $typeValues = [
        'Feste Zusage' => 'binding',
        'Interessiert' => 'interested'
    ];
    public $typeOfArrivalValues = [
        'Anreise mit Auto (voll)' => 'car_no_space',
        'Anreise mit Auto (biete MFG)' => 'car_space',
        'Anreise per MFG' => 'joining_other',
        'Anreise mit Zug (brauche Abholung)' => 'train_need_ride',
        'Anreise mit Zug (ohne Abholung)' => 'train_no_ride',
        'Noch nicht bekannt' => 'unknown'
    ];
    public $mealInfoValues = [
        'Ich bin ein Allesesser' => 'omnivorous',
        'Ich esse vegetarisch' => 'vegetarian',
        'Ich esse vegan' => 'vegan'
    ];
    public $lanOver = false;

    // form fields
    public $type = 'binding';
    public $arrival;
    public $departure;
    public $type_of_arrival = 'car_no_space';
    public $meal_info = 'omnivorous';
    public $allergies = false;
    public $comment = '';
    public $wish_drinks = '';
    public $wish_games = '';
    public $kitchen_duties_thu_ev = false;
    public $kitchen_duties_fri_mo = false;
    public $kitchen_duties_fri_ev = false;
    public $kitchen_duties_sat_mo = false;
    public $kitchen_duties_sat_ev = false;
    public $kitchen_duties_sun_mo = false;
    public $descentforum_login = '';

    public function mount()
    {
        $this->lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];

        if (count(UsersLans::where('lan_id', $this->lan->id)->where('user_id', Auth::user()->id)->get())) {
            return redirect('/lanedit');
        }

        if (date('Y-m-d') >= $this->lan->date_end) {
            $this->lanOver = true;
        }

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
    }

    public function render()
    {
        if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) > 0) {
            //return '';
        }

        return view('livewire.lan-registration');
    }

    public function register()
    {
        if ($this->lanOver) {
            return;
        }

        $this->validate([
            'type' => 'required|string',
            'arrival' => 'required|string',
            'departure' => 'required|string',
            'type_of_arrival' => 'required|string',
            'meal_info' => 'string',
            'comment' => 'string',
            'wish_drinks' => 'string',
            'wish_games' => 'string',
            'descentforum_login' => 'string'
        ]);

        if ($this->departure < $this->arrival) {
            $this->addError('departure', 'Abreise liegt vor der Anreise.');
            return;
        }

        UsersLans::create([
            'user_id' => Auth::user()->id,
            'lan_id' => $this->lan->id,
            'type' => $this->type,
            'arrival_date' => $this->arrival,
            'departure_date' => $this->departure,
            'type_of_arrival' => $this->type_of_arrival,
            'meal_info' => $this->meal_info,
            'allergies' => $this->allergies,
            'comment' => $this->comment,
            'wish_drinks' => $this->wish_drinks,
            'wish_games' => $this->wish_games,
            'kitchen_duties_thu_ev' => $this->kitchen_duties_thu_ev,
            'kitchen_duties_fri_mo' => $this->kitchen_duties_fri_mo,
            'kitchen_duties_fri_ev' => $this->kitchen_duties_fri_ev,
            'kitchen_duties_sat_mo' => $this->kitchen_duties_sat_mo,
            'kitchen_duties_sat_ev' => $this->kitchen_duties_sat_ev,
            'kitchen_duties_sun_mo' => $this->kitchen_duties_sun_mo,
            'league_descent_rebirth' => 0,
            'league_descent_3' => 0,
            'league_overload' => 0,
            'league_shootmania' => 0,
            'league_rocket_league' => 0,
            'league_csgo' => 0,
            'descentforum_login' => $this->descentforum_login
        ]);

        return redirect('/lanregister-done');
    }
}
