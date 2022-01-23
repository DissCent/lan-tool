<?php

namespace App\View\Components;

use App\Models\Lan;
use App\Models\UsersLans;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NavigationBar extends Component
{
    private $lan;
    private $registered = false;
    private $isAdmin = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];

        if (Auth::check()) {
            if (count(UsersLans::where('user_id', Auth::user()->id)->where('lan_id', $this->lan->id)->get()) > 0) {
                $this->registered = true;
            }

            $this->isAdmin = Auth::user()->isadmin;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation-bar', ['lan' => $this->lan, 'registered' => $this->registered, 'isAdmin' => $this->isAdmin]);
    }
}
