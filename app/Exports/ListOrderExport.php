<?php
namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ListOrderExport implements FromView
{
    public function view(): View
    {
        return view('exports.listorders', [
            'orders' => Order::orderBy("created_at",'desc')->orderBy("status",'desc')->get()
        ]);
    }
}
