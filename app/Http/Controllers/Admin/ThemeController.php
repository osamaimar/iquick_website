<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\RepositoryInterface\{OrderInterface,PackageInterface,ServiceInterface,AttachmentInterface,ContactInterface};
class ThemeController extends Controller
{

    private $repositoryOrder;
    private $repositoryPackage;
    private $repositoryAttachment;
    private $repositoryContact;
    private $repositoryService;

    public function __construct(OrderInterface $repositoryOrder,PackageInterface $repositoryPackage,ServiceInterface $repositoryService,AttachmentInterface $repositoryAttachment,ContactInterface $repositoryContact)
    {
        $this->repositoryOrder=$repositoryOrder;
        $this->repositoryPackage=$repositoryPackage;
        $this->repositoryService=$repositoryService;
        $this->repositoryAttachment=$repositoryAttachment;
        $this->repositoryContact=$repositoryContact;
        $this->middleware('permission:theme-list', ['only' => ['index','show']]);
    }

    public function index(){
        return view("admin.pages.theme.index",[
            'contact'=>$this->repositoryContact->all(),
            'service'=>$this->repositoryService->all(),
            'package'=>$this->repositoryPackage->all(),
            'order'=>$this->repositoryOrder->all(),
            'serviceOrder'=>$this->repositoryService->serviceOrder(),
            'latest_orders'=>Order::orderBy("status","Desc")->latest()->take(6)->get(),
        ]);
    }

    public function mode(){
        setcookie("mode","dark",time()+360*360*60,"/");
        if(isset($_COOKIE['mode']) && $_COOKIE['mode']=="dark"){
            setcookie("mode","ligth",time()+360*360*60,"/");
        }
        return back();
    }
}
