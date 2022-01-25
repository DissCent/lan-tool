<?php

namespace App\View\Components;

use App\Models\Lan;
use DateTime;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationsTable extends Component
{
    public $table = [];
    public $lanAvailable = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = DB::table('users_lans')
            ->join('lans', 'users_lans.lan_id', '=', 'lans.id')
            ->select('lans.name', 'lans.date_begin', 'users_lans.arrival_date', 'users_lans.departure_date', 'users_lans.type')
            ->where('user_id', Auth::user()->id)
            ->orderBy('users_lans.id', 'desc')
            ->get();

        $this->lanAvailable = count(Lan::whereRaw('id = (select max(`id`) from lans)')->whereRaw('date_begin > date(now())')->get()) > 0;
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
