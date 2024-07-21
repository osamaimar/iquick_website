<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;
class SearchService extends Component
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
        $service=Service::when($this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
        })->orderBy("id","Desc")->paginate();
        return view('livewire.admin.search-service',[
            'service'=>$service,
        ]);
    }
}
