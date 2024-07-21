@extends('user.master')


@section('title', __('admin.edit_profile'))

@section('page-title', __('admin.edit_profile'))
@section('css')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
            background-color: #191e3a;
            color: #2196f3;
            border-color: transparent;
        }
        .line{
            height: 1px;
            width: 215px;
            background-color: #191e8d;
            margin-bottom: 15px;
        }
    </style>
@endsection
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
            <form action="{{ route('user.profiles.update', $profile->id) }}" method="post" enctype="multipart/form-data"
                class="section general-info">
                @csrf
                @method('put')
                <div class="info">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">
                            @include('general-components.admin.message')
                            <div class="row">
                                <div class="col-xl-2 col-lg-12 col-md-4 mx-auto mb-3">
                                    <div class="upload mt-4 pr-md-4">
                                        <input type="file" id="input-file-max-fs" name="file" class="dropify"
                                            data-default-file="{{ asset('storage/images/profiles/'.$profile->file) }}"
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
                                    class="btn btn-primary mt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (!$sections->isEmpty())
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mt-5">
            <div class="card card-primary card-tabs">
                <div class="card-header border-bottom-0">
                    <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab" role="tablist">
                        <?php $a=0; ?>
                            @foreach ($sections as $section)
                            <li class="nav-item">
                                <a class="nav-link p-3 <?php  if($a==0):  ?> active <?php $a++;  endif; ?> " id="justify-pills-<?php echo str_replace(" ","",$section->title); ?>-tab" data-toggle="pill" href="#justify-pills-<?php echo str_replace(" ","",$section->title); ?>" role="tab" aria-controls="justify-pills-<?php echo str_replace(" ","",$section->title); ?>" aria-selected="true">{{$section->title}}</a>
                            </li>
                            @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="justify-pills-tabContent">
                        <?php $a=0; ?>
                        @foreach ($sections as $section)    
                        <div class="tab-pane fade  show <?php  if($a==0):  ?> active  <?php $a++;  endif; ?>" id="justify-pills-<?php echo str_replace(" ","",$section->title); ?>" role="tabpanel" aria-labelledby="justify-pills-<?php echo str_replace(" ","",$section->title); ?>-tab">                
                            <div class="row">
                                @foreach ($section->sections as $item)
                                @if ($item->small_title!=null ||$item->file!=null || $item->description!=null)
                                <div class="col-12 mb-3">
                                    <div class="card shadow" style="width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="padding-bottom: 6px;">{{$item->small_title}}</h5>
                                            <div class="line"></div>
                                            <p class="card-text mb-3">{{$item->description}}</p>
                                            @if ($item->file!=null)
                                            @if(in_array(explode(".",$item->file)[1],['png','jpg','webp','jpeg']))
                                            <a href="{{ route('user.download', $item->file) }}"><img
                                                    style="width: 35px;height: 35px;"
                                                    src="{{ asset('storage/images/sections/'.$item->file) }}" /></a>
                                            @else
                                            <a href="{{ route('user.download', $item->file) }}"><img
                                                    style="width: 35px;height: 35px;"
                                                    src="{{ asset('assets/images/download/Download-Icon.png') }}" /></a>
                                            @endif
                                            @endif
                                        </div>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
               </div>
            </div>
        </div>
        @endif
    </div>
@endsection