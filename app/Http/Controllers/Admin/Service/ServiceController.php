<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\{Service,Order};
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\RepositoryInterface\ServiceInterface;
use Auth;
use Storage;
use App\Traties\{UploadFile,GetData};
class ServiceController extends Controller
{

    use UploadFile;
    use GetData;

    private $repositoryService;

    public function __construct(ServiceInterface $repositoryService)
    {
        $this->repositoryService=$repositoryService;
        $this->middleware('permission:service-list', ['only' => ['index','show']]);
        $this->middleware('permission:service-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.service.index",[
            'service'=>$this->repositoryService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.service.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $request->validated();

        $service=$this->repositoryService->create($this->getService($request));
        $service->status = $request->status;
        $service->save();
        // $service->image=$this->uploadFile($request->file('image'),'/images/services/card/');

        // $service->image_single=$this->uploadFile($request->file('image_single'),'/images/services/single/');
        if ($request->hasFile('img'))
        {
            $request->file('img')->move(public_path('service/'), $request->file('img')->getClientOriginalName());

            $service->img = 'service/' . $request->file('img')->getClientOriginalName();
        }

        $service->save();


        return redirect("dashborad/services/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view("admin.pages.service.edit",compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $request->validated();

        if($request->has("img")){

            if($request->has("img")){
                $this->repositoryService->update($this->getServiceUpdate($request),$service);

            $request->file('img')->move(public_path('service/'), $request->file('img')->getClientOriginalName());

            $service->img = 'service/' . $request->file('img')->getClientOriginalName();    
                $service->save();
            }
            
        }else{

            $this->repositoryService->update($this->getServiceUpdate($request),$service);

        }
        $this->repositoryService->update($this->getServiceUpdate($request),$service);
        $service->status = $request->status;
        $service->save();
        return redirect("dashborad/services/$service->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // if($this->repositoryService->delete($service)){
        //     //Storage::Delete($service->image);
        // }

        $order=Order::where('type_id',$service->id)->where('type_order','service')->first();
        if($order!=null){
            return response()->json(['success'=>__('admin.can_not_dele'),'icon'=>'warning']);
        }else{
            $this->repositoryService->delete($service);
            return response()->json(['success'=>__("admin.deleted"),'icon'=>'success','id'=>$service->id]);
        }
    }
}
