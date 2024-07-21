<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\RepositoryInterface\{ContactInterface};
use App\Events\MyEventContact;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Str;
class ContactController extends Controller
{

    private $repositoryContact;

    public function __construct(ContactInterface $repositoryContact)
    {
        $this->repositoryContact=$repositoryContact;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreContactRequest  $StoreContactRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $request->validated();
        $contact=$this->repositoryContact->create($request->all());
         
        $data=[
            'username'=>$contact->name,
            'email'=>$contact->email,
            'message'=>Str::limit($contact->message,50)!=null?Str::limit($contact->message,50):'',
        ];
        $subject = "ايكويك - اتصل بنا";
        
        Mail::to('support@iquick.site')->send(new TestEmail($contact,$subject));
    
        broadcast(new MyEventContact($data))->toOthers();
        return response()->json(['success'=>__("messages.send_success")]);
    }


}
