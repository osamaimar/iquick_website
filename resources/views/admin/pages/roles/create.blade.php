@extends('admin.master')


@section('title', __('admin.add_new_role'))

@section('page-title', __('admin.add_new_role'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
<a href="{{route('admin.roles.index')}}" class="btn btn-info">
    @lang('admin.view_all_role')
</a>
{!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
<div class="row pt-4 pb-4">
    @include('general-components.admin.message')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mt-2">
            <strong>@lang('admin.name')</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row g-2 p-4">
            <div class="col-12 col-md-8 mb-4"><strong>@lang('admin.view_all_role') : {{$permission->count()}} @lang('admin.permission')</strong></div>
            <div class="col-12 col-md-4 mb-4"><a href="#!" class="btn btn-secondary w-100 addcheck">@lang('admin.select_all')</a><a href="#!" class="btn btn-danger w-100 d-none removecheck">@lang('admin.remove_all')</a></div>
            <div class="col-12 col-md-8 mb-4 mx-auto"><input id="myInput" value="{{ old('name') }}" placeholder="{{ __('admin.name') }}"
                class="form-control me-2" type="search"></div>
            <div class="col-12"></div>
            @foreach($permission as $value)
            @if (!strpos($value->name,"-"))
                <div class="col-12 border p-2 mypermission text-center" style="    background-color: #4d4d4c;
                color: white;">@lang("admin.$value->name")</div>
                <?php continue; ?>
            @endif
            <div class="col-xl-3 col-md-4 col-sm-6 col-12 border p-2 mypermission" >
                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                @lang("permission.$value->name") 
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-start mt-4">
        <button type="submit" class="btn btn-primary">@lang('admin.add_new_role')</button>
    </div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>


@endsection

@section("ajax")
<script>
    $(".addcheck").on("click",function(){
        $(".name").attr("checked",true);
        $(this).css("display","none");
        $(".removecheck").removeClass("d-none");
    });
    $(".removecheck").on("click",function(){
        $(".name").attr("checked",false);
        $(this).addClass("d-none");
        $(".addcheck").css("display","block");
    });
</script>
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".mypermission").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection