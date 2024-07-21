<?php


namespace App\RepositoryInterface;


interface PackageInterface{
    public function all();
    public function packageLimit();
    public function allService();
    public function create($request);
    public function attachmentFile($request);
    public function attachmentFileUpdate($request,$model);
    public function update($request,$model);
    public function delete($model);
}