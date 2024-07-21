@extends('admin.master')


@section('title', __('admin.add_new_service'))

@section('page-title', __('admin.add_new_service'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <a href="{{ route('admin.services.index') }}" class="btn btn-info mb-2">@lang('admin.services')</a>
            <form action="{{ route('admin.services.store') }}" method="post" class="border p-4" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder=@lang('admin.name')>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                            placeholder=@lang('admin.price')>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;"> 
                             <textarea name="small_description" class="form-control" placeholder="{{__('admin.small_description')}}">{{ old('small_description') }}</textarea>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                             <textarea name="description" class="form-control" placeholder="{{__('admin.big_description')}}">{{ old('description') }}</textarea>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="1">@lang('admin.public')</option>
                            <option value="0">@lang('admin.private')</option>
                        </select>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.add_new_service')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

