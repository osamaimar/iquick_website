@extends('admin.master')


@section('title', __('admin.add_new_user'))

@section('page-title', __('admin.add_new_user'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
        <a href="{{ route('admin.users.index') }}" class="btn btn-info mb-2">@lang('admin.users')</a>
        <form action="{{ route('admin.users.store') }}" method="post" class="p-4">
            @csrf
            <div class="row mb-4">
                <div class="col-12 mb-4">
                    <div class="form-check text-center">
                        <input type="checkbox" name="type_user" value="1" value="{{ old('type_user') }}" class="form-check-input" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('admin.type_user')
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control"
                        placeholder="{{ __('messages.firstname') }}">
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control"
                        placeholder="{{ __('messages.lastname') }}">
                </div>
                <div class="col-12 mb-4">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        placeholder="{{ __('admin.email') }}">
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.status')</label>
                    <select class="form-control" name="status" aria-label="Default select example">
                        <option value="0">@lang('admin.not_active')</option>
                        <option value="1">@lang('admin.active')</option>
                    </select>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.type')</label>
                    <select class="form-control" name="type" aria-label="Default select example">
                        <option value="user">@lang("admin.user")</option>
                        <option value="admin">@lang("admin.admin")</option>
                    </select>
                </div>
                <div class="col-12 mb-4">
                    <input type="text" name="password" value="{{ old('password') }}" class="form-control"
                        placeholder="{{ __('admin.password') }}">
                </div>
                <div class="col-12 mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.roles')</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <input type="submit" name="submit" value="{{ __('admin.add_new_user') }}" class="btn btn-primary">
        </form>
    </div>
</div>
</div>
@endsection