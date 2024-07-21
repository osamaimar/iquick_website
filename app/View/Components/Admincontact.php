<?php

namespace App\View\Components;

use App\Models\Contact;
use Illuminate\View\Component;

class Admincontact extends Component
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
        return view('components.admincontact',[
            'contacts'=>Contact::latest()->take(15)->orderBy("id",'desc')->get(),
        ]);
    }
}
