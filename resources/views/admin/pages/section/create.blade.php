@extends('admin.master')


@section('title', __('admin.add_sections'))

@section('page-title', __('admin.add_sections'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <a href="{{ route('admin.sections.index') }}" class="btn btn-info mb-2">@lang('admin.sections')</a>
            <form action="{{ route('admin.sections.store') }}" method="post" class="border p-4" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12   mb-4">
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                            placeholder="{{__('admin.name')}}">
                    </div>
                    <div class="col-12 mb-4">
                        <label class="control-label">@lang('admin.user')</label>
                        <select name="user_id" id="user_id1" class="form-control SlectBox">
                            <option></option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->firstname.' '.$user->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label>@lang('admin.profiles')</label>
                        <select class="form-control" name="profile_id" aria-label="Default select example">
                            
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <a href="#!" id="btn_add" class="btn btn-info">+</a>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="d-block" id="todo_list">
                            <div class="row remove_div">
                                <div class="col-12   mb-4">
                                    <input type="text" name="small_title[]"  class="form-control"
                                        placeholder="{{__('admin.small_title')}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea type="text" name="description[]" class="form-control"
                                        placeholder="{{__('admin.description')}}"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                title="Clear Image">x</a> @lang('admin.add_new_attach')</label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="file[]"
                                                class="form-control">
                                        </label>
                                    </div>
                                </div>
                            <div>
                        </div>
                    <div>
                    </div>
                </div>
                </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.add_sections')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
@section("ajax")
        <script>
        $(document).ready(function() {
            var html=`
                    <div class="row w-100 remove_div">
                        <div class="col-12 mb-4">
                            <a href="#!" id="btn_remove" class="btn btn-danger">-</a>
                        </div>
                        <div class="col-12   mb-4">
                                    <input type="text" name="small_title[]"  class="form-control"
                                        placeholder="{{__('admin.small_title')}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea type="text" name="description[]" class="form-control"
                                        placeholder="{{__('admin.description')}}"></textarea>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                title="Clear Image">x</a> @lang('admin.add_new_attach')</label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file" name="file[]"
                                                class="form-control">
                                        </label>
                                    </div>
                                </div>
                                
                    <div>
            `;
            $("#btn_add").on('click',function(){
                $("#todo_list").append(html);
            });
            $("#todo_list").on('click',"#btn_remove",function(){
                $(this).closest(".remove_div").remove();
            });
            
        });
        </script>
<script>
    $('select[name="user_id"]').on('click', function() {
           var client = $('#user_id1').val();
           if (client) {
               $.ajax({
                   url: `{{ url('dashborad/getProfile/section/${client}') }}`,
                   type: "GET",
                   dataType: "json",
                   success: function(data) {
                       $('select[name="profile_id"]').empty();
                       $.each(data, function(key, value) {
                           $('select[name="profile_id"]').append('<option value="' +
                               value['id'] + '">' + value['name'] + '</option>'
                           );
                       });
                   },
               });
           } else {
               console.log('AJAX load did not work');
           }
       });
</script>
@endsection
