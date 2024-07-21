<?php


namespace App\RepositoryInterface;


interface SettingInterface{
    public function first();
    public function create($request);
    public function update($request,$model);
    public function delete($model);
}