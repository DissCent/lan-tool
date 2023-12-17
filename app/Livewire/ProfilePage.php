<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilePage extends Component
{
    public $success = false;

    // form fields
    public $new_password = '';
    public $new_password_confirm = '';
    public $clan_tag;
    public $age;
    public $country_code;
    public $zip;
    public $city;
    public $show_zip_registered = true;
    public $show_zip_public = false;

    public function mount()
    {
        $user = Auth::user();
        $this->clan_tag = $user->clan_tag;
        $this->age = $user->age;
        $this->country_code = $user->country_code;
        $this->zip = $user->zip;
        $this->city = $user->city;
        $this->show_zip_registered = $user->show_zip_registered;
        $this->show_zip_public = $user->show_zip_public;
    }

    public function render()
    {
        return view('livewire.profile-page');
    }

    public function updateProfile()
    {
        $this->validate([
            'clan_tag' => 'string|in:Do,OOTS,VEX,',
            'age' => 'integer|required',
            'country_code' => 'required|string|in:AT,CA,CH,DE,DK,LU,US',
            'zip' => 'required|string',
            'city' => 'required|string'
        ]);

        $userAuth = Auth::user();
        $user = User::find($userAuth->id);

        if (strlen($this->new_password) > 0 || strlen($this->new_password_confirm) > 0) {
            $this->validate([
                'new_password' => 'required|string|min:8|same:new_password_confirm',
                'new_password_confirm' => 'required|string|min:8'
            ]);

            $user->password = Hash::make($this->new_password);
        }

        $user->clan_tag = $this->clan_tag;
        $user->age = $this->age;
        $user->country_code = $this->country_code;
        $user->zip = $this->zip;
        $user->city = $this->city;
        $user->show_zip_public = $this->show_zip_public;
        $user->show_zip_registered = $this->show_zip_registered;

        $user->save();

        $this->success = true;
    }
}
