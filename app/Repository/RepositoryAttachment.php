<?php


namespace App\Repository;

use App\RepositoryInterface\AttachmentInterface;

use App\Models\{Attachment,Order};

class RepositoryAttachment implements AttachmentInterface{

    public function all(){
        return Attachment::paginate();
    }
    public function create($request){
        return Attachment::create($request);
    }
    public function update($request,$attachment){
        return $attachment->update($request);
    }
    public function delete($attachment){
        return $attachment->delete();
    }
    public function allOrders(){
        return Order::all();
    }

}