@extends('admin.master')


@section('title', __('admin.edit_profile'))

@section('page-title', __('admin.edit_profile'))

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            @can('profile-list')
            <a href="{{ route('admin.profiles.index') }}" class="btn btn-info mb-2">@lang('admin.profiles')</a>
            @endcan
            <form action="{{ route('admin.profiles.update', $profile->id) }}" method="post" enctype="multipart/form-data"
                class="section general-info">
                @csrf
                @method("put")
                <div class="info">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            @include('general-components.admin.message')
                            <div class="row">
                                <div class="col-xl-2 col-lg-12 col-md-4 mx-auto mb-3">
                                    <div class="upload mt-4 pr-md-4">
                                        <input type="file" id="input-file-max-fs" name="file" class="dropify"
                                            data-default-file="{{ asset('storage/images/profiles/' . $profile->file) }}"
                                            data-max-file-size="2M" />
                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>@lang('user.profile_image')
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <input type="text" name="name" value="{{ $profile->name }}" class="form-control"
                            placeholder="{{__('admin.name')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <input type="url" name="link" value="{{ $profile->link }}" class="form-control"
                            placeholder="{{__('user.link')}}">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" value="{{ __('admin.edit_profile') }}"
                                    class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection