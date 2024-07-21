@extends('admin.master')


@section('title', __('admin.profile_history'))

@section('page-title', __('admin.profile_history'))

@section('content')
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row g-2 w-100">
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.count_order')</h5>
                                <p class="text-danger">{{ $order_count }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.order_count_successful')</h5>
                                <p class="text-danger">{{ $order_count_successful }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.order_count_pending')</h5>
                                <p class="text-danger">{{ $order_count_pending }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.order_count_done')</h5>
                                <p class="text-danger">{{ $order_count_done }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.order_count_canceled')</h5>
                                <p class="text-danger">{{ $order_count_canceled }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">@lang('user.profile_count')</h5>
                                <p class="text-danger">{{ $profile_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
