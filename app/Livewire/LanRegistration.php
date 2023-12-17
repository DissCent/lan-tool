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
    public $typeValues = [];
    public $typeOfArrivalValues = [];
    public $mealInfoValues = [];
    public $lanOver = false;
    public $kitchen_duty_count = [];

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
        $this->typeValues = [
            __('lan-forms.type-binding') => 'binding',
            __('lan-forms.type-interested') => 'interested',
        ];

        $this->typeOfArrivalValues = [
            __('lan-forms.approach-car-no-space') => 'car_no_space',
            __('lan-forms.approach-car-space') => 'car_space',
            __('lan-forms.approach-joining-other') => 'joining_other',
            __('lan-forms.approach-train-need-ride') => 'train_need_ride',
            __('lan-forms.approach-train-no-ride') => 'train_no_ride',
            __('lan-forms.approach-unknown') => 'unknown'
        ];

        $this->mealInfoValues = [
            __('lan-forms.mealinfo-omnivorous') => 'omnivorous',
            __('lan-forms.mealinfo-vegetarian') => 'vegetarian',
            __('lan-forms.mealinfo-vegan') => 'vegan'
        ];

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

        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_thu_ev');
        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_fri_mo');
        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_fri_ev');
        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_sat_mo');
        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_sat_ev');
        $this->kitchen_duty_count[] = UsersLans::where('lan_id', $this->lan->id)->whereNot('user_id', Auth::user()->id)->whereNot('type', 'cancelled')->sum('kitchen_duties_sun_mo');
    }

    public function render()
    {
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
            $this->addError('departure', __('lan-forms.error-departure'));
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
