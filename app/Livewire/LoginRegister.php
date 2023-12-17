<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UsersLans;
use App\Models\Lan;
use App\Models\UsersVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginRegister extends Component
{
    // login vars
    public $username;
    public $password;
    public $remember_me = false;

    // registration vars
    public $new_username;
    public $email;
    public $new_email;
    public $new_password;
    public $new_password_confirm;
    public $clan_tag = '';
    public $age;
    public $country_code = 'DE';
    public $zip;
    public $city;
    public $show_zip_registered = true;
    public $show_zip_public = false;

    public function render()
    {
        return view('livewire.login-register');
    }

    public function login()
    {
        $this->validate([
            'username' => 'string|required',
            'password' => 'string|required',
        ]);

        if (substr(strtolower($this->username), 0, 3) == 'vex'
            || substr(strtolower($this->username), 0, 5) == '<vex>'
            || substr(strtolower($this->username), 0, 2) == 'do'
            || substr(strtolower($this->username), 0, 4) == 'oots') {
            $this->addError('username', __('misc.no-clantag'));
            return;
        }

        $credentials = $this->only(['username', 'password']);

        if (! Auth::attempt($credentials, $this->remember_me)) {
            $this->addError('password', __('misc.login-wrong'));
        } else {
            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                $this->addError('username', __('misc.login-unvalidated'));
            } else {
                $lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];

                if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $lan->id)->get()) > 0) {
                    return redirect('/registrations');
                } else {
                    return redirect('/lanregister');
                }
            }
        }
    }

    public function register()
    {
        $this->validate([
            'new_username' => 'required|string',
            'email' => 'required|email',
            'new_password' => 'required|string|min:8|same:new_password_confirm',
            'new_password_confirm' => 'required|string|min:8',
            'clan_tag' => 'string|in:Do,OOTS,VEX,',
            'age' => 'integer|required',
            'country_code' => 'required|string|in:AT,CA,CH,DE,DK,LU,US',
            'zip' => 'required|string',
            'city' => 'required|string'
        ]);

        if (count(User::whereRaw('lower(username) = ?', [strtolower($this->new_username)])->get()) > 0) {
            $this->addError('new_username', __('misc.username-in-use'));
            return;
        }

        if (count(User::whereRaw('lower(email) = ?', [strtolower($this->email)])->get()) > 0) {
            $this->addError('new_username', __('misc.email-in-use'));
            return;
        }

        if (substr(strtolower($this->new_username), 0, 3) == 'vex'
            || substr(strtolower($this->new_username), 0, 5) == '<vex>'
            || substr(strtolower($this->new_username), 0, 2) == 'do'
            || substr(strtolower($this->new_username), 0, 4) == 'oots') {
            $this->addError('new_username', __('misc.no-clantag'));
            return;
        }

        $user = User::create([
            'username' => $this->new_username,
            'email' => $this->email,
            'password' => Hash::make($this->new_password),
            'clan_tag' => $this->clan_tag,
            'age' => $this->age,
            'country_code' => $this->country_code,
            'zip' => $this->zip,
            'city' => $this->city,
            'show_zip_public' => $this->show_zip_public,
            'show_zip_registered' => $this->show_zip_registered
        ]);

        $token = Str::random(64);

        UsersVerification::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        Mail::send('email.email-verification', [
            'token'=> $token,
            'server_url' => $_SERVER['HTTP_HOST'],
            'username' => $this->new_username
        ], function($message) {
            $message->to($this->email);
            $message->subject(__('misc.subject-registered') . ' ' . $_SERVER['HTTP_HOST']);
        });

        return redirect('/registered');
    }
}
