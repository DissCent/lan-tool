<?php

namespace App\View\Components;

use DateTime;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationsTable extends Component
{
    public $table = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $lans = DB::table('users_lans')
            ->join('lans', 'users_lans.lan_id', '=', 'lans.id')
            ->select('lans.name', 'lans.date_begin', 'users_lans.arrival_date', 'users_lans.departure_date', 'users_lans.type')
            ->where('user_id', Auth::user()->id)
            ->orderBy('users_lans.id', 'desc')
            ->get();

        foreach ($lans as $lan) {
            $this->table[] = [
                'name' => $lan->name,
                'arrival' => (new DateTime($lan->arrival_date))->format('d.m.Y'),
                'departure' => (new DateTime($lan->departure_date))->format('d.m.Y'),
                'type' => $lan->type,
                'editable' => $lan->date_begin > date('Y-m-d')
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registrations-table');
    }
}