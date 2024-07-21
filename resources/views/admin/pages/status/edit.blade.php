@extends('admin.master')


@section('title', __('admin.edit_status'))

@section('page-title', __('admin.edit_status'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ route('admin.status.index') }}" class="btn btn-info mb-2">@lang('admin.status')</a>
            <form action="{{ route('admin.status.update',$status->id) }}" method="post" class="p-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <input type="text" name="title" value="{{ $status->title }}" class="form-control"
                            placeholder="{{__('admin.name')}}">
                    </div>
                    <div class="col-3 mb-4">
                        <label for="exampleColorInput" class="form-label">{{__('admin.color')}}</label>
                        <input type="color" name="color" value="{{ $status->color }}" class="form-control form-control-color">
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.edit_status')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
