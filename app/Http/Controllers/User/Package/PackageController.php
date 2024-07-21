<?php

namespace App\Http\Controllers\User\Package;

use App\Http\Controllers\Controller;
use App\Models\{Package, Profile, Service};
use App\RepositoryInterface\{PackageInterface};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    private $repositoryPackage;

    public function __construct(PackageInterface $repositoryPackage)
    {
        $this->repositoryPackage=$repositoryPackage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->get('profile_id') == null) {
            $profile=Profile::where("user_id",Auth::user()->id)->first();
            session()->put('profile_id' , $profile->id);
        }
        
        $orderId = $request->query('order_id');
        $search = (request()->input('search') != null) ? request()->input('search') : null;
        $packages = Package::where('name','LIKE', '%'.$search.'%')->orderBy("id","Desc")->get();

        return view("user.pages.package.index",[
            'package'=>$packages,
            'service'=>Service::all(),
            'orderId'=>$orderId,
        ]);
    }

}
