<?php


namespace App\Repository;

use App\RepositoryInterface\SettingInterface;

use App\Models\{Setting};

class RepositorySetting implements SettingInterface{

    public function first(){
        return Setting::first();
    }
    public function create($request){
        $setting=Setting::create($request);
        return $setting;
    }
    public function update($request,$setting){
        return $setting->update($request);
    }
    public function delete($setting){
        return $setting->delete();
    }

}