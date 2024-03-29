<?php

namespace App\Livewire;

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
    public $typeValues = [];
    public $typeOfArrivalValues = [];
    public $mealInfoValues = [];
    public $lanOver = false;
    public $kitchen_duty_count = [];

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
    public $descentforum_login;

    public function mount()
    {
        $this->typeValues = [
            __('lan-forms.type-binding') => 'binding',
            __('lan-forms.type-interested') => 'interested',
            __('lan-forms.type-canceled') => 'cancelled'
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

        if (! count(UsersLans::where('lan_id', $this->lan->id)->where('user_id', Auth::user()->id)->get())) {
            return redirect('/lanregister');
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

        if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) > 0) {
            $lan = UsersLans::where('user_id', Auth::user()->id)
                ->where('lan_id', $this->lan->id)
                ->get()[0];

            $this->type = $lan->type;
            $this->arrival = $lan->arrival_date;
            $this->departure = $lan->departure_date;
            $this->type_of_arrival = $lan->type_of_arrival;
            $this->meal_info = $lan->meal_info;
            $this->allergies = (bool)$lan->allergies;
            $this->comment = $lan->comment;
            $this->wish_drinks = $lan->wish_drinks;
            $this->wish_games = $lan->wish_games;
            $this->kitchen_duties_thu_ev = (bool)$lan->kitchen_duties_thu_ev;
            $this->kitchen_duties_fri_mo = (bool)$lan->kitchen_duties_fri_mo;
            $this->kitchen_duties_fri_ev = (bool)$lan->kitchen_duties_fri_ev;
            $this->kitchen_duties_sat_mo = (bool)$lan->kitchen_duties_sat_mo;
            $this->kitchen_duties_sat_ev = (bool)$lan->kitchen_duties_sat_ev;
            $this->kitchen_duties_sun_mo = (bool)$lan->kitchen_duties_sun_mo;
            $this->descentforum_login = $lan->descentforum_login;
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
        if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) == 0) {
            return '';
        }

        return view('livewire.lan-edit');
    }

    public function update()
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
        $lan->league_descent_rebirth = 0;
        $lan->league_descent_3 = 0;
        $lan->league_overload = 0;
        $lan->league_shootmania = 0;
        $lan->league_rocket_league = 0;
        $lan->league_csgo = 0;
        $lan->descentforum_login = $this->descentforum_login;

        $lan->save();

        return redirect('/lanregister-done');
    }
}
