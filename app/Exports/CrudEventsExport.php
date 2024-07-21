<?php
namespace App\Exports;

use App\Models\CrudEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CrudEventsExport implements FromView
{
    protected $month;
    protected $user_id;
    public function __construct($month,$user_id){
        $this->month=$month;
        $this->user_id=$user_id;
    }
    public function view(): View
    {
        if($this->user_id!=null){
            return view('exports.events', [
                'events'=>CrudEvents::where("client_id",$this->user_id)->where("event_start",'LIKE',"%{$this->month}%")->orderBy('event_start', 'asc')->get()
            ]);
        }
        return view('exports.events', [
            'events'=>CrudEvents::where("event_start",'LIKE',"%{$this->month}%")->orderBy('event_start', 'asc')->get()
        ]);
    }
}
