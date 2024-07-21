<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageArchive;
use Illuminate\Http\Request;
use Auth;
class PackageArchiveController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:packageArchive-create', ['only' => ['create','store']]);
    }
    public function store(Request $request){
        
        if($request->service_id!=null){
            PackageArchive::where("order_id",$request->order_id)->update(
                [
                    "status"=>"0",
                ],
            );
            $package=Package::find($request->package_id);
            if($request->num_service!=null){
                foreach($request->num_service as $key=>$service){
                    PackageArchive::updateOrInsert(
                        ['service_id'=>$package->services[$key]->id,'order_id'=>$request->order_id],
                        [
                            "num_service"=>$service,
                        ],
                    );
                };
            }
            foreach($request->service_id as $key=>$service){
                PackageArchive::updateOrInsert(
                    ['service_id'=>$service,'order_id'=>$request->order_id],
                    [
                        "status"=>"1",
                        "service_id"=>$service,
                        "package_id"=>$request->package_id,
                        "order_id"=>$request->order_id,
                        'admin_id'=>Auth::user()->id
                    ],
                );
            };
            return response()->json(['success'=>__("admin.done_service"),'icon'=>'success']);
        }else{
            PackageArchive::where("order_id",$request->order_id)->update(
                [
                    "status"=>"0",
                ],
            );
            $package=Package::find($request->package_id);
            if($request->num_service!=null){
                foreach($request->num_service as $key=>$service){
                    PackageArchive::updateOrInsert(
                        ['service_id'=>$package->services[$key]->id,'order_id'=>$request->order_id],
                        [
                            "num_service"=>$service,
                        ],
                    );
                };
            }
            return response()->json(['success'=>__("admin.done_service"),'icon'=>'success']);
        } 
    }
    
}
