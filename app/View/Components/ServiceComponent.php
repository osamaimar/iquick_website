<?php

namespace App\View\Components;

use App\Models\Service;
use Illuminate\View\Component;

class ServiceComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Service $service)
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
        return view('front.components.service-component');
    }
}
