<?php


namespace App\Repository;

use App\RepositoryInterface\AboutInterface;

use App\Models\{About};

class RepositoryAbout implements AboutInterface{

    public function first(){
        return About::first();
    }
    public function create($request){
        $about=About::create($request);
        return $about;
    }
    public function update($request,$about){
        return $about->update($request);
    }
    public function delete($about){
        return $about->delete();
    }

}