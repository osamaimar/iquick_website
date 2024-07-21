<?php


namespace App\Repository;

use App\RepositoryInterface\PageInterface;

use App\Models\{Page};

class RepositoryPage implements PageInterface{

    public function all(){
        return Page::paginate();
    }
    public function privacy(){
        return Page::first();
    }
    public function terms(){
        return Page::all()->last();
    }
    public function create($request){
        $page=Page::create($request);
        return $page;
    }
    public function update($request,$page){
        return $page->update($request);
    }
    public function delete($page){
        return $page->delete();
    }

}