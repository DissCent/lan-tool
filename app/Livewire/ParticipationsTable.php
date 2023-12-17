<?php

namespace App\Livewire;

use App\Models\Lan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ParticipationsTable extends Component
{
    public $id;
    public $lans = [];
    public $verified = false;
    public $table = [];

    public function mount()
    {
        $this->id = Lan::orderBy('date_begin', 'desc')->limit(1)->get()[0]->id;

        if (Auth::check()) {
            $this->verified = User::where('id', Auth::user()->id)->get()[0]->user_verified_at != null;
        }

        $this->changeLan($this->id);

        $lans = Lan::orderBy('date_begin', 'desc')->get();

        foreach ($lans as $lan) {
            $this->lans[$lan->id] = $lan->name;
        }
    }

    public function changeLan($id)
    {
        $this->id = $id;

        $this->table = DB::table('users_lans')
        ->where('lan_id', $this->id)
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
    }

    public function render()
    {
        return view('livewire.participations-table');
    }
}
