<?php
namespace App\Exports\User;

use App\Models\CrudEvents;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class CrudEventsExport implements FromView
{

    protected $month;
    public function __construct($month){
        $this->month=$month;
    }
    public function view(): View
    {
        return view('exports.events', [
            'events'=>CrudEvents::where("client_id",Auth::user()->id)->where("event_start",'LIKE',"%{$this->month}%")->orderBy('event_start', 'asc')->get()
        ]);
    }
}
