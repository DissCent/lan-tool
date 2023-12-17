<?php

namespace App\View\Components;

use DateTime;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Lan;
use Illuminate\Support\Facades\Session;

class KitchenExport extends Component
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

        $this->csv = 'Küchendienst / Kitchen plan' . "\n\n";

        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_thu_ev', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Donnerstagabend / Thursday evening;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";


        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_fri_mo', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Freitagmorgen / Friday morning;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";


        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_fri_ev', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Freitagabend / Friday evening;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";


        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_sat_mo', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Samstagmorgen / Saturday morning;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";


        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_sat_ev', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Samstagabend / Saturday evening;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";


        $plan = DB::table('users_lans')
            ->where('lan_id', $id)
            ->where('kitchen_duties_sun_mo', '1')
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('username')
            ->orderBy('username')
            ->get();

        $this->csv .= 'Sonntagmorgen / Sunday morning;';

        $users = [];

        foreach ($plan as $entry) {
            $users[] = $entry->username;
        }

        $this->csv .= '"' . implode("\n", $users) . '"' . "\n";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=kuechenplan.csv');

        return $this->csv;
    }
}
