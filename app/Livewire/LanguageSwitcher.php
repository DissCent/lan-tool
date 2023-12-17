<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LanguageSwitcher extends Component
{
    public $german = true;
    public $path = '';

    public function mount()
    {
        $this->path = URL::full();
    }

    public function render()
    {
        if (Session::get('locale') != 'de') {
            $this->german = false;
        }

        return view('livewire.language-switcher');
    }

    public function changeLanguage($lang) {
        Session::put('locale', $lang);

        return redirect()->to($this->path);
    }
}
