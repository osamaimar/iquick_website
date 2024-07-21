<?php


namespace App\RepositoryInterface;


interface AttachmentInterface{
    public function all();
    public function create($request);
    public function update($request,$model);
    public function delete($model);
    public function allOrders();
}
