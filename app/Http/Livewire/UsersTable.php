<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
    public $table;

    public function render()
    {
        $this->table = User::whereNotNull('email_verified_at')->whereNull('user_verified_at')->get();
        return view('livewire.users-table');
    }

    public function unlock($user)
    {
        $users = User::where('id', $user)->get();

        if (count($users) != 1) {
            return;
        } else {
            $users[0]->user_verified_at = date('Y-m-d H:i:s');
            $users[0]->save();

            return $this->render();
        }
    }
}
