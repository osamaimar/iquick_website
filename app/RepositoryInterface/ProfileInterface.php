<?php


namespace App\RepositoryInterface;


interface ProfileInterface{
    public function all();
    public function allProfiles();
    public function create($request);
    public function update($request,$model);
    public function attachmentFile($request);
    public function delete($model);
}
