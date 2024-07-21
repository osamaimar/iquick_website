<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\RepositoryInterface\PageInterface;
class PageController extends Controller
{

    private $repositoryPage;

    public function __construct(PageInterface $repositoryPage)
    {
        $this->repositoryPage=$repositoryPage;
        $this->middleware('permission:page-list', ['only' => ['index','show']]);
        $this->middleware('permission:page-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.page.index",[
            'page'=>$this->repositoryPage->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $request->validated();
        $this->repositoryPage->create($request->all());
        return redirect("dashborad/pages/create")->withSuccess(__("admin.added successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.page.edit',[
            'page'=>$page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $request->validated();
        $this->repositoryPage->update($request->all(),$page);
        return redirect("dashborad/pages/$page->id/edit")->withSuccess(__("admin.updated successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->repositoryPage->delete($page);
        return response()->json(['success'=>__("admin.deleted"),'id'=>$page->id]);
    }
}
