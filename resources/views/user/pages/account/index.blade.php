@extends('user.master')


@section('title', __('user.accountsetting'))

@section('page-title', __('user.accountsetting'))

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
