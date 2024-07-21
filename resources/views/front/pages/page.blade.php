@extends('front.layouts.master')

@section('title', $page->name)

@section('css')
@endsection

@section('content')
<section class="vw-100 vh-100 position-absolute top-0 theme-gradient" style="z-index: -1"></section>

<section class="wrapper">
    <div class="container py-12">
        <div class="row text-center mb-10">
            <div class="col-lg-8 col-xl-7 col-xxl-6 mx-auto">
                <h2 class="text-uppercase mb-3">
                    {{$page->name}}
                </h2>
            </div>
            <!-- /column -->

            <div class="text-lg-start col-12">
                {!! $page->content !!}
            </div>
        </div>
</section>
<!-- /section -->

@endsection

@section('script')
@endsection

