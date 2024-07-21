@extends('admin.master')


@section('title', __('admin.add_new_attach'))

@section('page-title', __('admin.add_new_attach'))

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <a href="{{ route('admin.attachments.index') }}" class="btn btn-info mb-2">@lang('admin.attachments')</a>
            <form action="{{ route('admin.attachments.store') }}" method="post" class="border p-4"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <label for="inputName" class="control-label">@lang("admin.orders")</label>
                        <select name="order_id" class="form-control SlectBox">
                            @foreach ($order as $order)
                                <option value="{{ $order->id }}">{{$order->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" name="name_attach" value="{{ old('name_attach') }}" class="form-control"
                            placeholder=@lang('admin.name_attach')>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                    title="Clear Image">x</a> @lang('admin.notes')</label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="attachment_file"
                                    class="custom-file-container__custom-file__custom-file-input">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"
                                style="height: 92px;width: 100%;margin-top: 16px;margin-bottom: 16px;"></div>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="{{__('admin.add_new_attach')}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection

