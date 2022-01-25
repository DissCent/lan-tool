<?php

namespace App\View\Components;

use DateTime;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

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
        $table = DB::table('users_lans')
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
                'users_lans.wish_drinks')
            ->orderBy('users_lans.id', 'ASC')
            ->get();

        $this->csv = '"';
        $this->csv .= implode('";"', [
            'Spielername',
            'Registrierungszeitpunkt',
            'E-Mail-Adresse',
            'Clan-Mitgliedschaft',
            'Alter',
            'Land',
            'PLZ',
            'Ortschaft',
            'Art der Anmeldung',
            'Anreise',
            'Abreise',
            'Küchendienst Do. Abend',
            'Küchendienst Fr. früh',
            'Küchendienst Fr. Abend',
            'Küchendienst Sa. früh',
            'Küchendienst Sa. Abend',
            'Küchendienst So. früh',
            'Art der Anreise',
            'Ernährung',
            'Allergien',
            'Anmerkungen',
            'Liga-Wunsch DXX-Rebirth',
            'Liga-Wunsch Descent 3',
            'Liga-Wunsch Overload',
            'Liga-Wunsch Shootmania',
            'Liga-Wunsch Rocket League',
            'Liga-Wunsch CS: GO',
            'Spielewunsch',
            'Getränkewunsch'
        ]);
        $this->csv .= "\"\n";

        $arrivalValueTable = [
            'train_need_ride' => 'Zug (Abholung benötigt)',
            'train_no_ride' => 'Zug (keine Abholung)',
            'car_space' => 'Auto (bietet MFG)',
            'car_no_space' => 'Auto (voll)',
            'joining_other' => 'Mitfahrt bei MFG',
            'unknown' => 'unbekannt'
        ];

        foreach ($table as $row) {
            $this->csv .= '"';
            $this->csv .= implode('";"', [
                $row->username,
                (new DateTime($row->created_at))->format('d.m.Y H:i'),
                $row->email,
                $row->clan_tag,
                $row->age,
                $row->country_code,
                $row->zip,
                $row->city,
                ($row->type == 'binding' ? 'Anmeldung' : ($row->type == 'interested' ? 'interessiert' : 'Absage')),
                (new DateTime($row->arrival_date))->format('d.m.Y'),
                (new DateTime($row->departure_date))->format('d.m.Y'),
                $row->kitchen_duties_thu_ev ? 'Ja' : 'Nein',
                $row->kitchen_duties_fri_mo ? 'Ja' : 'Nein',
                $row->kitchen_duties_fri_ev ? 'Ja' : 'Nein',
                $row->kitchen_duties_sat_mo ? 'Ja' : 'Nein',
                $row->kitchen_duties_sat_ev ? 'Ja' : 'Nein',
                $row->kitchen_duties_sun_mo ? 'Ja' : 'Nein',
                $arrivalValueTable[$row->type_of_arrival],
                $row->meal_info == 'omnivorous' ? 'Allesesser' : ($row->meal_info == 'vegetarian' ? 'vegetarisch' : 'vegan'),
                $row->allergies ? 'Ja' : 'Nein',
                $row->comment,
                $row->league_descent_rebirth ? 'Ja' : 'Nein',
                $row->league_descent_3 ? 'Ja' : 'Nein',
                $row->league_overload ? 'Ja' : 'Nein',
                $row->league_shootmania ? 'Ja' : 'Nein',
                $row->league_rocket_league ? 'Ja' : 'Nein',
                $row->league_csgo ? 'Ja' : 'Nein',
                $row->wish_games,
                $row->wish_drinks
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
