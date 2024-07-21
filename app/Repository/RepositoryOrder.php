<?php


namespace App\Repository;

use App\RepositoryInterface\OrderInterface;

use App\Models\{Order,Attachment};

class RepositoryOrder implements OrderInterface{

    public function all(){
        return Order::orderBy("created_at",'desc')->orderBy("status",'desc')->paginate();
    }
    public function attachmentFile($request){
        return Attachment::create($request);
    }
    public function update($request,$order){
        return $order->update($request);
    }
    public function delete($order){
        return $order->delete();
    }

    public function orderUser($user){
        return Order::where(['user_id'=>$user->id])->get();
    }

}