<?php


namespace App\RepositoryInterface;


interface PageInterface{
    public function all();
    public function privacy();
    public function terms();
    public function create($request);
    public function update($request,$model);
    public function delete($model);
}