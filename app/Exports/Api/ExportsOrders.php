<?php

namespace App\Exports\Api;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportsOrders implements FromView
{
    public function view(): View{
        $profile_id=auth()->guard('api')->user()->profile_id;
        $order = Order::where('user_id', auth()->guard('api')->user()->id)
            ->where('profile_id', $profile_id)->orderBy("id","Desc")->get();
        return view('exports.orderapi', [
            'order'=>$order
        ]);
    }
}
