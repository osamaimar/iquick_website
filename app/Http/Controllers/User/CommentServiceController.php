<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentService;
use App\Http\Requests\User\StoreServiceCommentRequest;
use App\Traties\{UploadFile,GetData};

class CommentServiceController extends Controller
{
    use UploadFile, GetData;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceCommentRequest $request)
    {
        $request->validated();

        if($request->has('file')&&$request->file!=null){
            $request->file=$this->uploadFile($request->file('file'),'/images/orders/attachments/');
        }
        CommentService::create($this->storeCommentService($request));

        return redirect()->back()->with('success','تم اتمام العمليه بنجاح');

    }

    /**
     * Display the resource.
     *
     * @param  \{{ namespacedParentModel }}  ${{ parentModelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \{{ namespacedParentModel }}  ${{ parentModelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the resource from storage.
     *
     * @param  \{{ namespacedParentModel }}  ${{ parentModelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        abort(404);
    }
}
