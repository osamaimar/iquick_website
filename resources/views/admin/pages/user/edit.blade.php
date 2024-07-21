@extends('admin.master')


@section('title', __('admin.edit_user'))

@section('page-title', __('admin.edit_user'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <a href="{{ route('admin.users.index') }}" class="btn btn-info mb-2">@lang('admin.users')</a>
            <form action="{{ route('admin.users.update',$user->id) }}" method="post" class="p-4">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <div class="form-check text-center">
                            <input type="checkbox" name="type_user" value="1" @if ($user->type_user=="1") checked @endif value="{{ old('type_user') }}" class="form-check-input" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                @lang('admin.type_user')
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control"
                            placeholder="{{ __('messages.firstname') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control"
                            placeholder="{{ __('messages.lastname') }}">
                    </div>
                    <div class="col-12  mb-4">
                        <input type="text" name="password" class="form-control"
                            placeholder="{{ __('admin.password') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.status')</label>
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="0"@if($user->status=='0') selected @endif>@lang('admin.not_active')</option>
                            <option value="1"@if($user->status=='1') selected @endif>@lang('admin.active')</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.type')</label>
                        <select class="form-control" name="type" aria-label="Default select example">
                            <option value="user" @if($user->type=='user') selected @endif>@lang("admin.user")</option>
                            <option value="admin"@if($user->type=='admin') selected @endif>@lang("admin.admin")</option>
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">@lang('admin.roles')</label>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <input type="submit" name="submit" value="{{ __('admin.edit_user') }}" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
