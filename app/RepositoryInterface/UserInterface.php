<?php


namespace App\RepositoryInterface;


interface UserInterface{
    public function all();
    public function create($request);
    public function update($request,$model);
    public function delete($model);
}