@extends('admin.master')


@section('title', __('admin.edit_service'))

@section('page-title', __('admin.edit_service'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <a href="{{ route('admin.services.index') }}" class="btn btn-info mb-2">@lang('admin.services')</a>
            <form action="{{ route('admin.services.update', $service->id) }}" method="post" class="border p-4"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="name" value="{{ $service->name }}" class="form-control"
                            placeholder=@lang('admin.name')>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="price" value="{{ $service->price }}" class="form-control"
                            placeholder=@lang('admin.price')>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                             <textarea name="small_description" class="form-control" placeholder="{{__('admin.small_description')}}">{{ $service->small_description }}</textarea>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="col-12 mb-4">
                        <textarea class="form-control" name="description" placeholder="{{__('admin.big_description')}}">{{ $service->description }}</textarea>
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="1"@if ($service->status=="1") selected @endif>@lang('admin.public')</option>
                            <option value="0"@if ($service->status=="0") selected @endif>@lang('admin.private')</option>
                        </select>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.edit_service')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
