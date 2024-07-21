<?php

namespace App\View\Components;

use App\Models\Notice;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Messages extends Component
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
        return view('components.messages',[
            'notices'=>Notice::where("user_id",Auth::user()->id)->latest()->take(15)->orderBy("id",'desc')->get()
        ]);
    }
}
