<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Cat;

class Navbare extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $data['cats'] = Cat::select('id','name')->active()->get();

        return view('components.navbare')->with($data);
    }
}
