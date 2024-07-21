<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:stock-list', ['only' => ['index','show']]);
        $this->middleware('permission:stock-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return view("admin.pages.stock.index", [
            'stocks' => Stock::orderBy("id","desc")->paginate()
        ]);
    }
    public function destroy(Stock $stock){
        $stock->delete();
        return response()->json([
            'success' => __("admin.deleted"),
            'id'      =>  $stock->id
        ]);
    }
}
