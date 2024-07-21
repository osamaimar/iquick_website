<?php


namespace App\Repository;

use App\RepositoryInterface\ContactInterface;

use App\Models\{Contact};

class RepositoryContact implements ContactInterface{

    public function all(){
        return Contact::orderBy("id","desc")->paginate();
    }
    public function create($request){
        $contact=Contact::create($request);
        return $contact;
    }
    public function update($request,$contact){
        return $contact->update($request);
    }
    public function delete($contact){
        return $contact->Delete();
    }

}