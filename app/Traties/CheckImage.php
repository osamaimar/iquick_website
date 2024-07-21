<?php


namespace App\Traties;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
trait CheckImage{

    public function storeImgaeSetting($request){
        $request->header_logo=$this->uploadFile($request->file('header_logo'),'/images/settings/header_logo/');
        $request->footer_logo=$this->uploadFile($request->file('footer_logo'),'/images/settings/footer_logo/');
        $request->icon=$this->uploadFile($request->file('icon'),'/images/settings/icon/');
    }

    public function updateImgaeSetting($request,$setting){
        if($request->has("header_logo")){
            $request->header_logo=$this->uploadFileUpate($request->file('header_logo'),'/images/settings/header_logo/',$setting->header_logo);
        }
        if($request->has("footer_logo")){
            $request->footer_logo=$this->uploadFileUpate($request->file('footer_logo'),'/images/settings/footer_logo/',$setting->footer_logo);
        }
        if($request->has("icon")){
            $request->icon=$this->uploadFileUpate($request->file('icon'),'/images/settings/icon/',$setting->icon);
        }
    }
   
    public function storeImage($request){
        $request->image1=$this->uploadFile($request->file('image1'),'/images/abouts/');
        $request->image2=$this->uploadFile($request->file('image2'),'/images/abouts/');
        $request->image3=$this->uploadFile($request->file('image3'),'/images/abouts/');
        $request->image4=$this->uploadFile($request->file('image4'),'/images/abouts/');
    }

    public function checkImage($request,$about){
        if($request->has("image1")){
            $request->image1=$this->uploadFileUpate($request->file('image1'),'/images/abouts/',$about->image1);
        }
        if($request->has("image2")){
            $request->image2=$this->uploadFileUpate($request->file('image2'),'/images/abouts/',$about->image2);
        }
        if($request->has("image3")){
            $request->image3=$this->uploadFileUpate($request->file('image3'),'/images/abouts/',$about->image3);
        }
        if($request->has("image4")){
            $request->image4=$this->uploadFileUpate($request->file('image4'),'/images/abouts/',$about->image4);
        }
    }

    public function checkFile($request,$attachment){
        if($request->has("attachment_file")){
           
            $request->attachment_file=$this->uploadFileUpate($request->file('attachment_file'),'/images/orders/attachments/',$attachment->file);
           
            $this->repositoryAttachment->update($this->getAttachmentUpdate($request,$attachment),$attachment);    
        }else{
           
            $this->repositoryAttachment->update($this->getAttachmentUpdate($request,$attachment),$attachment);
        
        }
    }


    public function checkType($request){
        $request->attachment_file=$this->uploadFile($request->file('attachment_file'),'/images/orders/attachments/');
        $this->repositoryAttachment->create($this->getAttachmentTypeOrder($request,"App\Models\Order"));
    }

    public function modelImage($request,$model,$floder){
        if($request->has("image")){
            $request->image=$this->uploadFileUpate($request->file('image'),"/images/$floder/card/",$model->image);
        }
        
        if($request->has("image_single")){
            $request->image_single=$this->uploadFileUpate($request->file('image_single'),"/images/$floder/single/",$model->image_single);
        }
        
    }

}