<?php

namespace App\View\Components;

use App\Models\Page;

use Illuminate\View\Component;

class NavFooter extends Component
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
        $page=Page::all();
        return view('components.nav-footer',[
            'page'=>$page
        ]);
    }
}
