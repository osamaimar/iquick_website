<?php

namespace App\Exports\Api;

use App\Models\CrudEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportsCrudEvents implements FromView
{
    public function view(): View{
        return view('exports.events', [
            'events'=>CrudEvents::where("client_id",auth()->guard('api')->user()->id)->orderBy('event_start', 'asc')->get()
        ]);
    }
}
