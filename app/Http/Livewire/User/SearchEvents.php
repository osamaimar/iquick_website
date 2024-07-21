<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CrudEvents;
use Auth;
class SearchEvents extends Component
{


    use WithPagination;

    public $event_name;
    public $status;
    public $event_start;
    public $event_end;


    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->event_name='';
        $this->event_start='';
        $this->event_end='';
    }

    
    public function render()
    {
        $event=CrudEvents::where('client_id',Auth::user()->id)->when($this->event_name!=''||$this->event_start!=''||$this->event_end!='',function($query){
            $query->where('event_name','LIKE', '%'.$this->event_name.'%');
            if($this->event_end!=''&&$this->event_start!=''){
                $query->where('event_end',">",$this->event_start);
                $query->where('event_start','<',$this->event_end);
            }elseif($this->event_end!=''){
                $query->where('event_start','<',$this->event_end);
            }elseif($this->event_start!=''){
                $query->where('event_end',">",$this->event_start);
            }
        })->paginate();
        return view('livewire.user.search-events',[
            'event'=>$event,
        ]);
    }
}
