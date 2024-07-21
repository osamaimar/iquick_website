@extends('user.master')


@section('title', __('admin.add_new_profile'))

@section('page-title', __('admin.add_new_profile'))

@section('content')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3mfb45n';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <a href="{{ route('user.profiles.index') }}" class="btn btn-info mb-2">@lang('admin.profiles')</a>
            <form action="{{ route('user.profiles.store') }}" method="post" enctype="multipart/form-data"
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