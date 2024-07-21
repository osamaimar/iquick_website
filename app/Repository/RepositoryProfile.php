<?php


namespace App\Repository;

use App\RepositoryInterface\ProfileInterface;

use App\Models\{Profile,Attachment};

use Auth;

class RepositoryProfile implements ProfileInterface{

    public function all(){
        return Profile::paginate();
    }
    public function allProfiles(){
        return Profile::where('user_id',Auth::user()->id)->orderBy('id',"DESC")->get();
    }
    public function attachmentFile($request){
        return Attachment::create($request);
    }
    public function create($request){
        return Profile::create($request);
    }
    public function update($request,$Profile){
        return $Profile->update($request);
    }
    public function delete($Profile){
        return $Profile->delete();
    }
}