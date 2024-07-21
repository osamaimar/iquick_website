@if (!empty($service))

    <!-- Start Services -->
    <section class="services">
        <div class="container">
            <!-- Start Main Title -->
            <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                <h2 class="main-title text-white">@lang('messages.service')</h2>
                <div class="d-flex align-items-center text-responsive-service">
                    <p class="text-center mt-5 mb-5">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>
                    <a href="{{ route('service') }}" class="text-left">عرض الكل</a>
                </div>
            </div>
            <!-- End Main Title -->

            <!-- Start  Boxes -->
            <div class="owl-carousel owl-carousel-services owl-theme container" id="slider-services">
                @foreach ($service as $servic)
                    <div class="row" style="height: 100%">
                        <div class="col-sm-12 col-md-6 col-lg-4 d-flex item w-100">
                            <div class="box-service mt-3 d-flex" >
                                <div class="card-service">
                                    <div class="d-flex justify-content-center py-3">
                                        @if ($servic->img)
                                            <img src="{{ asset($servic->img) }}" style="width:90px;height:80px;" alt="services">
                                        @else
                                            <img src="{{ asset('assets/images/services/Group 335.svg') }}" style="width: auto;" alt="services">
                                        @endif
                                    </div>
                                    <div class="card-title text-center mb-3">
                                        <p>{{ $servic->name }}</p>
                                    </div>
                                    <p class="card-text mx-4 mb-3"><?php echo Str::limit($servic->small_description, 600); ?></p>
                                    <hr />
                                    <div class="rating-service">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/images/services/Star 3.svg') }}" alt="rating">
                                            <p>4.9</p>
                                        </div>
                                        <a class="service-btn-home" id="service-btn-home" id="service-btn-home" data-url="{{ route('get.details.services',$servic->id) }}">عرض التفاصيل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End  Boxes -->

    </section>
    <!-- End Services -->

    <!-- Modal pop pursher -->
        <div class="popup-service" id="popup-2">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>

                <div class="img">
                    <div class="d-flex justify-content-center py-3">
                        @if ($servic->img)
                            <img src="{{ asset($servic->img) }}" style="width:90px;height:80px;" alt="packages">
                        @else
                            <img src="{{ asset('assets/images/services/Group 335 (1).svg') }}" style="width: 140px;height: 120px;" alt="packages">
                        @endif
                    </div>
                </div>

                <h4 id="genral-title-service" class="mb-3"></h4>

                <div class="content-modal d-flex justify-content-center align-items-center mb-3">
                    <div class="">
                        <p class="text-rateing-packag-right">(12)</p>
                    </div>
                    <div class="img center">
                        <img src="{{asset('assets/images/packages/Group 1000001491.svg')}}" alt="img">
                    </div>
                    <div class="">
                        <p class="text-rateing-packag-left">4.9</p>
                    </div>

                </div>

                <p id="text-info-service"></p>

                <div id="box-services-service">
                </div>

                <div class="price mt-4" id="price-service">
                </div>

                <div class="btn-all">

                    @auth
                        <div class="btn-pricing mt-4 d-flex justify-content-center align-items-center">
                            <a href="#">شراء</a>
                        </div>
                    @else
                        <div class="btn-pricing mt-4 d-flex justify-content-center align-items-center">
                            <a id="loginButton">شراء</a>
                        </div>
                    @endauth

                    <div class="btn-cancle mt-4 d-flex justify-content-center align-items-center">
                        <a>الغاء</a>
                    </div>

                </div>
            </div>
        </div>
    <!-- Modal -->


@endif


