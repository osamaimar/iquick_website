<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Service;
class PayPalController extends Controller
{
    public function showinvoice($id)
    {
        $orders = Service::findOrFail($id);
        return view('paypal.index',compact('orders'));
    }

    public function showinvoicespackeges($id)
    {
        $orders = Package::findOrFail($id);
        return view('paypal.package',compact('orders'));
    }
}
