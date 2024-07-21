<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
class SearchUser extends Component
{


    use WithPagination;

    public $name;
    public $status;
    public $email;
    public $type;
    public $code;


    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->name='';
        $this->status='';
        $this->email='';
        $this->type='';
        $this->code='';
    }

    
    public function render()
    {
        $user=User::when($this->code!=''||$this->status!=''||$this->name!=''||$this->email!=''||$this->type!='',function($query){
            $query->where('firstname','LIKE', '%'.$this->name.'%');
            $query->where('email','LIKE', '%'.$this->email.'%');
            if($this->status!=''){
                $query->where('status','LIKE', '%'.$this->status.'%');
            }
            if($this->type!=''){
                $query->where('type','LIKE', '%'.$this->type.'%');
            }
            if($this->code!=''){
                $query->where('code','LIKE', '%'.$this->code.'%');
            }
        })->paginate();
        return view('livewire.admin.search-user',[
            'user'=>$user,
        ]);
    }
}
