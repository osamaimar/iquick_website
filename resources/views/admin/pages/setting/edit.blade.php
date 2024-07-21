@extends('admin.master')


@section('title', __('admin.edit_setting'))

@section('page-title', __('admin.edit_setting'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <form action="{{ route('admin.settings.update',$setting->id) }}" method="post" class="border p-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <input type="text" name="name" value="{{ $setting->name }}" class="form-control"
                            placeholder="{{ __('admin.name_web') }}">
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small') header logo</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="header_logo"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage1">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small') footer logo</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="footer_logo"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage2">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.image_small') icon</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="icon"
                                    class="form-control">
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.small_description')</label>
                        <textarea id="mytextarea" name="small_description">{{ $setting->small_description }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.large_description')</label>
                        <textarea id="mytextarea1" name="about_us">{{ $setting->about_us }}</textarea>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control"
                            placeholder="{{ __('admin.phone') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="email" name="email" value="{{ $setting->email }}" class="form-control"
                            placeholder="{{ __('admin.email') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="address" value="{{ $setting->address }}" class="form-control"
                            placeholder="{{ __('admin.address') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="url" name="facebook" value="{{ $setting->facebook }}" class="form-control"
                            placeholder="{{ __('admin.facebook') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="url" name="twitter" value="{{ $setting->twitter }}" class="form-control"
                            placeholder="{{ __('admin.twitter') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="url" name="insta" value="{{ $setting->insta }}" class="form-control"
                            placeholder="{{ __('admin.insta') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="url" name="youtube" value="{{ $setting->youtube }}" class="form-control"
                            placeholder="{{ __('admin.youtube') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="url" name="Linkedin" value="{{ $setting->Linkedin }}" class="form-control"
                            placeholder="{{ __('admin.Linkedin') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="mail_password" value="{{ $setting->mail_password }}" class="form-control"
                            placeholder="{{__('admin.mail_password')}}" >
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="email" name="mail_from_address" value="{{ $setting->mail_from_address }}" class="form-control"
                            placeholder="{{__('admin.mail_from_address')}}" >
                    </div>
                    {{-- <div class="col-12 mb-4">
                        <input type="url" name="live_chat" value="{{ $setting->live_chat }}" class="form-control"
                            placeholder="{{__('admin.live_chat')}}" >
                    </div> --}}
                </div>
                <input type="submit" name="submit" value="{{ __('admin.edit_setting') }}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
