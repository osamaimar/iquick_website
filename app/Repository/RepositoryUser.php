<?php


namespace App\Repository;

use App\RepositoryInterface\UserInterface;

use App\Models\{User};

class RepositoryUser implements UserInterface{

    public function all(){
        return User::paginate();
    }
    public function create($request){
        $user=User::create($request);
        return $user;
    }
    public function update($request,$user){
        return $user->update($request);
    }
    public function delete($user){
        return $user->delete();
    }

}