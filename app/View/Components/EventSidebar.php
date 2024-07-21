<?php

namespace App\View\Components;

use App\Models\CrudEvents;
use Carbon\Carbon;
use Illuminate\View\Component;

class EventSidebar extends Component
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
        return view('components.event-sidebar',[
            'today_events'=>CrudEvents::where("event_start",date('Y-m-d'))->count(),
            'tomorrow_events'=>CrudEvents::where("event_start",Carbon::tomorrow())->count()
        ]);
    }
}
