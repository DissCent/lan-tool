<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Lan;

class LanInfo extends Component
{
    private $lan;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lan = Lan::whereRaw('id = (select max(`id`) from lans)')->get()[0];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lan-info', ['lan' => $this->lan]);
    }
}
