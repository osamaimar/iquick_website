<?php


namespace App\RepositoryInterface;


interface ServiceInterface{
    public function all();
    public function serviceLimit();
    public function serviceOrder();
    public function create($request);
    public function attachmentFile($request);
    public function attachmentFileUpdate($request,$model);
    public function update($request,$model);
    public function delete($model);
}