<?php

namespace App\View\Components;

use DateTime;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Lan;
use Illuminate\Support\Facades\Session;

class CsvExport extends Component
{
    public $csv = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $id = Lan::orderBy('date_begin', 'desc')->limit(1)->get()[0]->id;

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        }

        $table = DB::table('users_lans')
            ->where('lan_id', $id)
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('users.username',
                'users_lans.created_at',
                'users.email',
                'users.clan_tag',
                'users.age',
                'users.country_code',
                'users.zip',
                'users.city',
                'users_lans.type',
                'users_lans.arrival_date',
                'users_lans.departure_date',
                'users_lans.kitchen_duties_thu_ev',
                'users_lans.kitchen_duties_fri_mo',
                'users_lans.kitchen_duties_fri_ev',
                'users_lans.kitchen_duties_sat_mo',
                'users_lans.kitchen_duties_sat_ev',
                'users_lans.kitchen_duties_sun_mo',
                'users_lans.type_of_arrival',
                'users_lans.meal_info',
                'users_lans.allergies',
                'users_lans.comment',
                'users_lans.league_descent_rebirth',
                'users_lans.league_descent_3',
                'users_lans.league_overload',
                'users_lans.league_shootmania',
                'users_lans.league_rocket_league',
                'users_lans.league_csgo',
                'users_lans.wish_games',
                'users_lans.wish_drinks',
                'users_lans.descentforum_login')
            ->orderBy('users_lans.id', 'ASC')
            ->get();

        $this->csv = '"';
        $this->csv .= implode('";"', [
            __('csv-additional.player-name'),
            __('csv-additional.registration-datetime'),
            __('login-register.email'),
            __('csv-additional.clan-info'),
            __('login-register.age'),
            __('csv-additional.country'),
            __('login-register.zip'),
            __('login-register.city'),
            __('csv-additional.type'),
            __('participations-table.approach'),
            __('registrations-table.departure'),
            __('lan-forms.descentforum-login'),
            __('csv-additional.kitchen-service-1'),
            __('csv-additional.kitchen-service-2'),
            __('csv-additional.kitchen-service-3'),
            __('csv-additional.kitchen-service-4'),
            __('csv-additional.kitchen-service-5'),
            __('csv-additional.kitchen-service-6'),
            __('csv-additional.approach-type'),
            __('csv-additional.nutrition-type'),
            __('lan-forms.allergies'),
            __('lan-forms.comment'),
        ]);
        $this->csv .= "\"\n";

        $arrivalValueTable = [
            'train_need_ride' => __('lan-forms.approach-train-need-ride'),
            'train_no_ride' => __('lan-forms.approach-train-no-ride'),
            'car_space' => __('lan-forms.approach-car-space'),
            'car_no_space' => __('lan-forms.approach-car-no-space'),
            'joining_other' => __('lan-forms.approach-joining-other'),
            'unknown' => __('lan-forms.approach-unknown'),
        ];

        foreach ($table as $row) {
            $this->csv .= '"';
            $this->csv .= implode('";"', [
                $row->username,
                Session::get('locale') == 'de' ? (new DateTime($row->created_at))->format('d.m.Y H:i') : (new DateTime($row->created_at))->format('Y-m-d H:i'),
                $row->email,
                $row->clan_tag,
                $row->age,
                $row->country_code,
                $row->zip,
                $row->city,
                ($row->type == 'binding' ? __('lan-forms.type-binding') : ($row->type == 'interested' ? __('lan-forms.type-interested') : __('lan-forms.type-canceled'))),
                Session::get('locale') == 'de' ? (new DateTime($row->arrival_date))->format('d.m.Y') : $row->arrival_date,
                Session::get('locale') == 'de' ? (new DateTime($row->departure_date))->format('d.m.Y') : $row->departure_date,
                $row->descentforum_login,
                $row->kitchen_duties_thu_ev ? __('misc.yes') : __('misc.no'),
                $row->kitchen_duties_fri_mo ? __('misc.yes') : __('misc.no'),
                $row->kitchen_duties_fri_ev ? __('misc.yes') : __('misc.no'),
                $row->kitchen_duties_sat_mo ? __('misc.yes') : __('misc.no'),
                $row->kitchen_duties_sat_ev ? __('misc.yes') : __('misc.no'),
                $row->kitchen_duties_sun_mo ? __('misc.yes') : __('misc.no'),
                $arrivalValueTable[$row->type_of_arrival],
                $row->meal_info == 'omnivorous' ? __('csv-additional.mealtype-omnivorous') : ($row->meal_info == 'vegetarian' ? __('lan-forms.mealinfo-vegetarian') : __('lan-forms.mealinfo-vegan')),
                $row->allergies ? __('misc.yes') : __('misc.no'),
                $row->comment,
            ]);
            $this->csv .= "\"\n";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=lan-teilnehmer.csv');

        return $this->csv;
    }
}
