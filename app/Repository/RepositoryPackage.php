<?php


namespace App\Repository;

use App\RepositoryInterface\PackageInterface;

use App\Models\{Package,Service,Attachment};

class RepositoryPackage implements PackageInterface{

    public function all(){
        return Package::orderBy("id","Desc")->paginate();
    }
    public function packageLimit(){
        return Package::limit(3)->get();
    }
    public function allService(){
        return Service::all();
    }
    public function create($request){
        $package=Package::create($request);
        return $package;
    }
    public function attachmentFile($request){
        return Attachment::create($request);
    }
    public function attachmentFileUpdate($request,$Attachment){
        return $Attachment->update($request);
    }
    public function update($request,$package){
        return $package->update($request);
    }
    public function delete($package){
        return $package->delete();
    }

}