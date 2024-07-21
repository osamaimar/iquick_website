<?php


namespace App\RepositoryInterface;


interface OrderInterface{
    public function all();
    public function update($request,$model);
    public function delete($model);
    public function attachmentFile($request);
    public function orderUser($model);
}