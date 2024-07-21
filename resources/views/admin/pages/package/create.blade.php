@extends('admin.master')


@section('title', __('admin.add_new_package'))

@section('page-title', __('admin.add_new_package'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <a href="{{ route('admin.packages.index') }}" class="btn btn-info mb-2">@lang('admin.packages')</a>
            <form action="{{ route('admin.packages.store') }}" method="post" class="border p-4" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="{{ __('admin.name') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                            placeholder="{{ __('admin.price') }}">
                    </div>
                    <div class="col-12 mb-4" style="overflow: hidden;">
                        <textarea name="small_description" class="form-control" placeholder="{{ __('admin.small_description') }}">{{ old('small_description') }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="col-12 mb-4">
                        <textarea class="form-control" name="description" placeholder="{{ __('admin.big_description') }}">{{ old('description') }}</textarea>
                    </div>
                    <div class="col-12 mb-4">
                        <a href="#!" id="btn_add" class="btn btn-info">+</a>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="d-block" id="todo_list">
                            <div class="row remove_div">
                                <div class="col-12 col-md-6 mb-4">
                                    <label>@lang('admin.note_service')</label>
                                    <select class="form-control" name="service_id[]" required>
                                        <option selected></option>
                                        @foreach ($service as $servic)
                                            <option value="{{ $servic->id }}">{{ $servic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <label>@lang('admin.num_service')</label>
                                    <input type="text" name="num_service[]" required  value=""  class="form-control">
                                </div>
                            <div>
                        </div>
                    <div>
                </div>
                </div>
                </div>
                <input type="submit" name="submit" value="{{ __('admin.add_new_package') }}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
@section("ajax")
        <script>
        $(document).ready(function() {
            var html=`
                    <div class="row w-100 remove_div">
                        <div class="col-12 col-md-6 mb-4">
                            <label>@lang('admin.note_service')</label>
                            <select class="form-control" name="service_id[]" required>
                                <option selected></option>
                                @foreach ($service as $servic)
                                    <option value="{{ $servic->id }}">{{ $servic->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label>@lang('admin.num_service')</label>
                            <input type="text" name="num_service[]"  required
                                class="form-control" >
                        </div>
                        <div class="col-12 mb-4">
                            <a href="#!" id="btn_remove" class="btn btn-danger">-</a>
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

@endsection