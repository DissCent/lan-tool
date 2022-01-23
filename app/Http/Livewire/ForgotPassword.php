<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Component
{
    public $email = '';

    public function render()
    {
        return view('livewire.forgot-password');
    }

    public function submitForm()
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        Password::sendResetLink($this->only(['email']), function($user, $token) {
            Mail::send('email.password-reset', [
                'token'=> $token,
                'server_url' => $_SERVER['HTTP_HOST'],
                'username' => $user->username
            ], function($message) {
                $message->to($this->email);
                $message->subject('Deine Passwort-Anfrage auf ' . $_SERVER['HTTP_HOST']);
            });
        });

        return redirect('/forgot-password-confirm');
    }
}
