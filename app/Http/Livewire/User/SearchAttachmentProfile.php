<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Attachment,Profile};
use Auth;
class SearchAttachmentProfile extends Component
{


    use WithPagination;

    public $name;
    public $profile_id;
    public function paginationView()
    {
        return 'general-components.admin.pagination';
    }

    public function mount(Profile $profile){
        $this->name='';
        $this->profile_id=$profile->id;
    }

    
    public function render()
    {
        $profile=Profile::where('id',$this->profile_id)->first();
        $attachment=Attachment::where('attachmentable_id',$profile->id)->where('attachmentable_type','App\Models\Profile')->when($this->name!='',function($query){
            $query->where('name','LIKE', '%'.$this->name.'%');
        })->orderBy("id","Desc")->paginate();
        return view('livewire.user.search-attachment-profile',[
            'attachment'=>$attachment,
        ]);
    }
}
