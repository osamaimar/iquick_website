<?php


namespace App\RepositoryInterface;


interface AboutInterface{
    public function first();
    public function create($request);
    public function update($request,$model);
    public function delete($model);
}