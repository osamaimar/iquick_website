@extends('admin.master')


@section('title', __('admin.add_new_page'))

@section('page-title', __('admin.add_new_page'))

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ route('admin.pages.index') }}" class="btn btn-info mb-2">@lang('admin.pages')</a>
            <form action="{{ route('admin.pages.store') }}" method="post" class=" p-4" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder=@lang('admin.name')>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <textarea id="mytextarea" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.add_new_page')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection
