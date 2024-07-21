<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attachment;
class SearchAttachment extends Component
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
        $attachment=Attachment::when($this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
        })->orderBy("id","Desc")->paginate();
        return view('livewire.admin.search-attachment',[
            'attachment'=>$attachment,
        ]);
    }
}
