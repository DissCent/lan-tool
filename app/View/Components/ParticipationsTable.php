<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Lan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ParticipationsTable extends Component
{
    public $lan;
    public $verified = false;
    public $table = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];

        $this->table = DB::table('users_lans')
            ->where('lan_id', $this->lan->id)
            ->join('users', 'users_lans.user_id', '=', 'users.id')
            ->select('users.username',
                'users_lans.arrival_date',
                'users_lans.departure_date',
                'users.zip',
                'users_lans.type_of_arrival',
                'users.show_zip_public',
                'users.show_zip_registered',
                'users_lans.type',
                'users.country_code',
                'users.user_verified_at',
                'users.id',
                'users.clan_tag')
            ->orderByRaw('FIELD(type, "binding", "interested", "cancelled"), users_lans.id')
            ->get();

        if (Auth::check()) {
            $this->verified = User::where('id', Auth::user()->id)->get()[0]->user_verified_at != null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.participations-table');
    }
}
