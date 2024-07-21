<?php

namespace App\View\Components;

use App\Models\AssignedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AssignedtaskSidebar extends Component
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
        $pending_tasks=0;
        $done_tasks=0;
        $orders=AssignedTask::where('user_task_id',Auth::user()->id)->get();
        foreach ($orders as $order) {
            if($order->order->status=="pending"){
                $pending_tasks+=1;
            }elseif($order->order->status=="done"){
                $done_tasks+=1;
            }
        }
        return view('components.assignedtask-sidebar',[
            'pending_tasks'=>$pending_tasks,
            'done_tasks'=>$done_tasks
        ]);
    }
}
