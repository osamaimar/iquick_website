<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
class Search extends Component
{


    use WithPagination;

    public $code;
    public $status;
    public $start;
    public $end;


    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->code='';
        $this->status='';
        $this->start='';
        $this->end='';
    }

    
    public function render()
    {
        $order=Order::when($this->status!=''||$this->code!=''||$this->start!=''||$this->end!='',function($query){
            if($this->code!=''){
                $query->where('code','LIKE', '%'.$this->code.'%');
            }
            $query->where('status','LIKE', '%'.$this->status.'%');
            if( $this->start && $this->start!=''&&$this->end&&$this->end!=''){
                if( $this->start!=$this->end){
                  $query->whereBetween('total_price',[$this->start, $this->end]);
                }else{
                    $query->where('total_price','<',$this->end);
                }
            }elseif( $this->start&& $this->start!=''){
                $query->where('total_price',">",$this->start);
            }elseif($this->end&&$this->end!=''){
                $query->where('total_price',"<",$this->end);
            }
        })->orderBy("status",'desc')->orderBy("id","desc")->paginate();
        return view('livewire.admin.search',[
            'order'=>$order,
        ]);
    }
}
