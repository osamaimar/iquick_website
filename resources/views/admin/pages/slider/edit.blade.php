@extends('admin.master')


@section('title', __('admin.edit_slider'))

@section('page-title', __('admin.edit_slider'))

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-info mb-2">@lang('admin.sliders')</a>
            <form action="{{ route('admin.sliders.update',$slider->id) }}" method="post" class="p-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <label for="">@lang('admin.slider_note')</label>
                        <input type="file" name="image" value="{{ $slider->image }}" class="form-control"
                            placeholder=@lang('admin.image')>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.edit_slider')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
