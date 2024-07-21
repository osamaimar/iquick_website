<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Attachment,Order};
use Auth;
class SearchAttachment extends Component
{


    use WithPagination;

    public $order_id;

    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->order_id='';
    }

    
    public function render()
    {
        $order=Order::where('user_id',Auth::user()->id)->get();
        $attachment=[];
        foreach($order as $ord){
            $attachment[]=Attachment::where('attachmentable_id',$ord->id)->get();
        }
        $attachment=Attachment::when($this->order_id!='',function($query){
            $query->where('attachmentable_id',$this->order_id);
        })->orderBy("id","Desc")->paginate();
        return view('livewire.user.search-attachment',[
            'attachment'=>$attachment,
            'order'=>$order,
        ]);
    }
}
