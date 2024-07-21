<?php

namespace App\View\Components;

use App\Models\Package;
use Illuminate\View\Component;

class PackageComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Package $package)
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
        return view('front.components.package-component');
    }
}
