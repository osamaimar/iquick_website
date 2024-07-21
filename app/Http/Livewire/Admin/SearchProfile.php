<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Profile,User};
class SearchProfile extends Component
{


    use WithPagination;

    public $name;
    public $user_id;
    public $code;

    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->name='';
        $this->user_id='';
        $this->code='';
    }

    
    public function render()
    {
        $profile=Profile::when($this->code!=''||$this->user_id!=''||$this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
            if($this->user_id!=''){
                $query->where('user_id',$this->user_id);
            }
            if($this->code!=''){
                $query->where('code','LIKE', '%'.$this->code.'%');
            }
        })->orderBy("id","Desc")->paginate();
        return view('livewire.admin.search-profile',[
            'profile'=>$profile,
            'user'=>User::where("type","user")->get(),
        ]);
    }
}
