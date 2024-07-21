<?php
namespace App\Exports;

use App\Models\Profile;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProfileExport implements FromView
{
    public function view(): View
    {
        return view('exports.profile', [
            'profiles' => Profile::orderBy("id","Desc")->get()
        ]);
    }
}
