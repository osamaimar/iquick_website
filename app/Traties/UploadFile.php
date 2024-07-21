<?php


namespace App\Traties;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
trait UploadFile{
    public function uploadFile($file,$destination){
        $destination_path=$destination;
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->storeAs($destination_path,$filename);
        return $filename;
    }

    public function uploadFileUpate($file,$destination,$model){
        if(Storage::disk()->delete($destination.$model)){
            $destination_path=$destination;
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->storeAs($destination_path,$filename);
        }else{
            $destination_path=$destination;
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->storeAs($destination_path,$filename);
        }
        return $filename;
    }

}