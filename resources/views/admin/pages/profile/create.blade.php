@extends('admin.master')


@section('title', __('admin.add_new_profile'))

@section('page-title', __('admin.add_new_profile'))

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            @can('user-getProfileUser')
            <a href="{{route("admin.get/profile/user",$user_id)}}" class="btn btn-info mb-2">@lang('admin.profiles')</a>
            @endcan
            <form action="{{ route('admin.profiles.store') }}" method="post" enctype="multipart/form-data"
                class="section general-info">
                @csrf
                <div class="info">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            @include('general-components.admin.message')
                            <div class="row">
                                <div class="col-xl-2 col-lg-12 col-md-4 mx-auto mb-3">
                                    <div class="upload mt-4 pr-md-4">
                                        <input type="file" id="input-file-max-fs" name="file" class="dropify"
                                            data-default-file="{{ asset('admin/dark/assets/img/200x200.jpg') }}"
                                            data-max-file-size="2M" />
                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>@lang('user.profile_image')
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <input type="hidden" value="{{$user_id}}" name="user_id" class="form-control">
                                            <div class="form-group">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="{{__('admin.name')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <input type="url" name="link" value="{{ old('link') }}" class="form-control"
                            placeholder="{{__('user.link')}}">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" value="{{ __('admin.add_new_profile') }}"
                                    class="btn btn-primary mt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection