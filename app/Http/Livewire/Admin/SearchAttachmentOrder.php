<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Attachment,order};
use Auth;
class SearchAttachmentOrder extends Component
{


    use WithPagination;

    public $name;
    public $order_id;
    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(Order $order){
        $this->name='';
        $this->order_id=$order->id;
    }

    
    public function render()
    {
        $order=Order::where('id',$this->order_id)->first();
        $attachment=Attachment::where('attachmentable_id',$order->id)->where('attachmentable_type','App\Models\Order')->when($this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
        })->orderBy("id","ASC")->paginate();
        return view('livewire.admin.search-attachment-order',[
            'attachment'=>$attachment,
            'order_id'=>$this->order_id,
        ]);
    }
}
