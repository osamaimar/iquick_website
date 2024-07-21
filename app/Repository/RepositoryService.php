<?php


namespace App\Repository;

use App\RepositoryInterface\ServiceInterface;

use App\Models\{Service,Attachment,Order};

class RepositoryService implements ServiceInterface{

    public function all(){
        return Service::paginate();
    }
    public function serviceLimit(){
        return Service::limit(6)->get();
    }
    public function serviceOrder(){
        return Order::where('type_order','service')->get();
    }
    public function create($request){
        $service=Service::create($request);
        return $service;
    }
    public function attachmentFile($request){
        return Attachment::create($request);
    }
    public function attachmentFileUpdate($request,$Attachment){
        return $Attachment->update($request);
    }
    public function update($request,$service){
        return $service->update($request);
    }
    public function delete($service){
        return $service->delete();
    }

}