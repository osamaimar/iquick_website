@extends('user.master')


@section('title', __('admin.sections'))

@section('page-title', __('admin.sections'))

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
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <?php $a=0; ?>
                        @foreach ($sections as $section)
                        <li class="nav-item">
                            <a class="nav-link p-3 <?php  if($a==0):  ?> active <?php $a++;  endif; ?> " id="custom-tabs-three-<?php echo str_replace(" ","",$section->title); ?>-tab" data-toggle="pill" href="#custom-tabs-three-<?php echo str_replace(" ","",$section->title); ?>" role="tab" aria-controls="custom-tabs-three-<?php echo str_replace(" ","",$section->title); ?>" aria-selected="true">{{$section->title}}</a>
                        </li>
                        @endforeach
                </ul>
            </div>
            <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <?php $a=0; ?>
                @foreach ($sections as $section)    
                <div class="tab-pane fade  show <?php  if($a==0):  ?> active  <?php $a++;  endif; ?>" id="custom-tabs-three-<?php echo str_replace(" ","",$section->title); ?>" role="tabpanel" aria-labelledby="custom-tabs-three-<?php echo str_replace(" ","",$section->title); ?>-tab">                
                    <div class="row">
                        @foreach ($section->sections as $item)
                        <div class="col-12 mb-3">
                            <div class="card shadow" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title" style="    border-bottom: 1px solid;
                                    padding-bottom: 6px;">{{$item->small_title}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                    @if ($item->file!=null)
                                        @if(in_array(explode(".",$item->file)[1],['png','jpg','webp','jpeg']))
                                        <a href="{{ route('user.download', $item->file) }}"><img
                                                style="width: 35px;height: 35px;"
                                                src="{{ asset('storage/images/sections/'.$order->file) }}" /></a>
                                        @else
                                        <a href="{{ route('user.download', $item->file) }}"><img
                                                style="width: 35px;height: 35px;"
                                                src="{{ asset('assets/images/download/Download-Icon.png') }}" /></a>
                                        @endif
                                    @endif
                                </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
           </div>
        
        </div>
    </div>
</div>
@endsection
@section('ajax')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection

