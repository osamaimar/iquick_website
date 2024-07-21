<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use App\Models\{Package,Order,PackageArchive};
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\RepositoryInterface\{PackageInterface};
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
use Illuminate\Support\Facades\DB;
class PackageController extends Controller
{

    use UploadFile;
    use GetData;

    private $repositoryPackage;

    public function __construct(PackageInterface $repositoryPackage)
    { 
        $this->repositoryPackage=$repositoryPackage;
        $this->middleware('permission:package-list', ['only' => ['index','show']]);
        $this->middleware('permission:package-create', ['only' => ['create','store']]);
        $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:package-delete', ['only' => ['destroy']]);
        $this->middleware('permission:package-deleteService', ['only' => ['deleteService']]);
        $this->middleware('permission:package-getService', ['only' => ['getService']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.package.index",[
            'package'=>$this->repositoryPackage->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.package.create",[
            'service'=>$this->repositoryPackage->allService()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        $package=$this->repositoryPackage->create($this->getPackage($request));

        // $package->image=$this->uploadFile($request->file('image'),'/images/packages/card/');

        // $package->image_single=$this->uploadFile($request->file('image_single'),'/images/packages/single/');

        // $package->save();

        if($request->has("service_id") && $request->service_id!=null){
            $services=$request->service_id;
            $num_services=$request->num_service;
            foreach($services as $key=>$service){
                DB::table('package_service')->updateOrInsert(
                    ['service_id'=>$service,"package_id"=>$package->id],
                    [
                        "service_id"=>$service,
                        "package_id"=>$package->id,
                        "num_service"=>$num_services[$key]
                    ],
                );
            };
        }
        
        if ($request->hasFile('img'))
        {
            $request->file('img')->move(public_path('packegs/'), $request->file('img')->getClientOriginalName());

            $package->img = 'packegs/' . $request->file('img')->getClientOriginalName();
        }
        
        $package->save();

        return redirect("dashborad/packages/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view("admin.pages.package.edit",[
            'service'=>$this->repositoryPackage->allService(),
            'package'=>$package
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $request->validated();

        if($request->has("img")){

            if($request->has("img")){
                $this->repositoryPackage->update($this->getPackageUpdate($request),$package);

            $request->file('img')->move(public_path('packegs/'), $request->file('img')->getClientOriginalName());

            $package->img = 'packegs/' . $request->file('img')->getClientOriginalName();
            }
            

        }else{

            $this->repositoryPackage->update($this->getPackageUpdate($request),$package);

        }

        $this->repositoryPackage->update($this->getPackageUpdate($request),$package);

        if($request->has("service_id") && $request->service_id[0]!=''){
            $services=$request->service_id;
            $num_services=$request->num_service;
            foreach($services as $key=>$service){
                DB::table('package_service')->updateOrInsert(
                    ['service_id'=>$service,"package_id"=>$package->id],
                    [
                        "service_id"=>$service,
                        "package_id"=>$package->id,
                        "num_service"=>$num_services[$key]
                    ],
                );
            };
        }
        
        return redirect("dashborad/packages/$package->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        // if($this->repositoryPackage->delete($package)){
        //     Storage::Delete($package->image);
        // }
        $order=Order::where('type_id',$package->id)->where('type_order','package')->first();
        if($order!=null){
            return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
        }else{
            $this->repositoryPackage->delete($package);
            return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$package->id]);
        }
    }

    public function deleteService($package_id,$service_id){
        DB::table('package_service')->where("package_id",$package_id)->where("service_id",$service_id)->delete();
        return redirect("dashborad/packages/$package_id/edit")->withSuccess(__("admin.deleted"));
    }

    public function getService($order_id){
        $servicePackage=PackageArchive::where("order_id",$order_id)->get();
        $service=[];
        foreach($servicePackage as $servicePackag){
            $service[]=[
                'service_name'=>$servicePackag->service_name,
                'status'=>$servicePackag->status,
                'num_service'=>$servicePackag->num_service,
                'service_id'=>$servicePackag->service_id,
                'num_servicetotle'=>DB::table('package_service')->where("service_id",$servicePackag->service_id)->first()->num_service,
                'num_service_done'=>$servicePackag->num_service,
            ];
        }
        return response()->json($service);        
    }

}
