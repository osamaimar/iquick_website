<?php

namespace App\Http\Livewire\user;

use Livewire\Component;
use App\Models\Profile;
use Livewire\WithPagination;
use Auth;
class SearchProfile extends Component
{


    use WithPagination;

    public $name;


    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(){
        $this->name='';
    }

    
    public function render()
    {
        $profile=Profile::where('user_id',Auth::user()->id)->when($this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
        })->orderBy("id","Desc")->paginate();
        return view('livewire.user.search-profile',[
            'profile'=>$profile,
        ]);
    }
}
