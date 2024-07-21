@extends('admin.master')


@section('title', __('admin.edit_about'))

@section('page-title', __('admin.edit_about'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            {{-- <a href="{{ route('admin.abouts.index') }}" class="btn btn-info mb-2">@lang('admin.abouts')</a> --}}
            <form action="{{ route('admin.abouts.update', $about->id) }}" method="post" class="border p-4"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <input type="text" name="title" value="{{ $about->title }}" class="form-control"
                            placeholder=@lang('admin.name')>
                    </div>
                    <div class="col-12 mb-4">
                        <textarea id="mytextarea" class="form-control" name="description">{{ $about->description }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image1"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage1">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image2"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage2">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image3"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage3">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image4"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.edit_about')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
