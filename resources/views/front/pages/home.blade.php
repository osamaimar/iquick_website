@extends('front.master')


@section('title', __('messages.home'))

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session('success_send_email'))
        <script>
            swal({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success_send_email') }}'
            });
        </script>
    @endif


    <!-- Start Login -->
    <section class="popup-login">
        <div class="overlay"></div>

        <div class="content">
            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>

            <div class="inside-content">
                <div class="img">
                    <div class="d-flex justify-content-start py-3">
                        <h4>تسجيل الدخول</h4>
                    </div>
                </div>

                <p style="height:20px;">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                </p>

                <div class="content-modal">
                    <div class="col-md-6">
                        <div class="py-5">
                            <div class="">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" name="email"
                                            class="email-input @error('email') is-invalid @enderror" id="email"
                                            placeholder="البريد الالكتروني" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>
                                        @error('email')

                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @else
                                            @if (session('error'))
                                                <span class="badge badge-danger" style="background-color:#dc3545;">
                                                    <strong>{{ session('error') }}</strong>
                                                </span>
                                            @endif
                                        @enderror

                                    </div>

                                    <div class="mb-3 position-relative">
                                        <input type="password" name="password"
                                            class="password-input @error('password') is-invalid @enderror" id="password"
                                            placeholder="كلمة المرور" required autocomplete="current-password">
                                        <i class="far fa-eye toggle-password" id="togglePassword"
                                            onclick="togglePasswordVisibility()"></i>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="text-forget-password">
                                        <div class="text-right">
                                            <input type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember"
                                                style="color: #A5A5A5; text-align: left; font-size: 14px; font-family: Tajawal; font-style: normal; font-weight: 500; line-height: normal;">
                                                تذكرني
                                            </label>
                                        </div>
                                        <div class="text-left">
                                            @if (Route::has('password.request'))
                                                <a class="" href="{{ route('password.request') }}">
                                                    هل نسيت كلمة المرور ؟
                                                </a>
                                            @endif
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="submit-btn mt-3">إرسال</button>
                                </form>
                            </div>

                            <div class="create-account d-flex text-center ">
                                <p class="">لا تملك حساب ؟</p>
                                <a href="{{ route('register') }}" class="create-btn">إنشاء حساب</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login -->

    <!-- Start Register -->
    <section class="popup-register">
        <div class="overlay"></div>

        <div class="content">
            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>

            <div class="inside-content">
                <div class="img">
                    <div class="d-flex justify-content-start py-3">
                        <h4>إنشاء حساب</h4>
                    </div>
                </div>

                <p style="height:20px;">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                </p>

                <div class="content-modal">
                    <div class="col-md-6">
                        <div class="py-5">
                            <div class="">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="">
                                            <input type="text" name="firstname" value="{{ old('firstname') }}"
                                                class="firstname-input @error('firstname') is-invalid @enderror"
                                                id="floatingName" placeholder="اسم المستخدم">

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="email-input @error('email') is-invalid @enderror" id="floatingPassword"
                                            placeholder="البريد الإلكتروني">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="password-input @error('password') is-invalid @enderror" id="password"
                                            placeholder="كلمة المرور">

                                        <i class="far fa-eye toggle-password" id="togglePassword"
                                            onclick="togglePasswordVisibility()"></i>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="mb-3 position-relative">
                                        <input type="password" value="{{ old('firstname') }}"
                                            name="password_confirmation" class="password-input" id="password-confirm"
                                            placeholder=" تأكيد كلمة السر ">
                                        <i class="far fa-eye toggle-password" id="togglePassword-confirm"
                                            onclick="togglePasswordVisibilityconfirm()"></i>
                                    </div>



                                    <button type="submit" class="submit-btn mt-3">إرسال</button>
                                </form>
                            </div>

                            <div class="create-account d-flex text-center ">
                                <p class="">هل تملك حساب بالفعل ؟</p>
                                <a href="{{ route('login') }}" class="create-btn">تسجيل الدخول</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->

    <!-- Modal pop login -->
    <div class="pop-error-login" id="myModal">
        <div class="overlay"></div>
        <div class="content-pop-login">
            <div class="close-btn">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="content-main-login-service">
                <img src="{{ asset('assets/images/تنبيه.svg') }}" class="mb-3" alt="warning">
                <h3>عنوان</h3>
                <p>تفاصيل الخدمة تفاصيل تفاصيلتفاصيل تفاصيل تفاصيل تفاصيل</p>
                <div class="login-btn-warning">
                    <a href="{{ route('login') }}">سجل الان</a>
                </div>
                <div class="close-btn-warning">
                    <a>الغاء</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal pop login -->

    <!-- start new div -->
    <section class="header-section">
        <div class="container">
            <nav class="navbar navbar-expand-lg  navbar-custom">
                <a class="navbar-brand" href="https://iquick.site/home"><img
                        src="{{ asset('assets/images/icon-main.svg') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="xmarx-closnav" id="xmarx-closnav">
                        <i class="fa-solid fa-x"></i>
                    </div>

                    <ul class="navbar-nav text-center mx-md-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-coustom nav-active" aria-current="page"
                                href="{{ route('home') }}">@lang('messages.home')</a>
                            <hr>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-coustom me-0 me-md-3 me-lg-4"
                                href="{{ route('home') }}#advantages">@lang('messages.advantages')</a>
                            <hr>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-coustom me-0 me-md-3 me-lg-4"
                                href="{{ route('package') }}">@lang('messages.package')</a>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-coustom me-0 me-md-3 me-lg-4"
                                href="{{ url('services') }}">@lang('messages.service')</a>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-coustom me-0 me-md-3 me-lg-4"
                                href="{{ route('home') }}#contact-us">تواصل معنا</a>
                            <hr>
                        </li>
                    </ul>
                    @if (auth()->guard()->guest())
                        @if (Route::has('login'))
                            <div class="d-flex justify-content-center">
                                <a class="btn nav-btn_sign_now" id="nav-btn_sign_now">@lang('messages.Login')</a>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a class="btn nav-btn_signup_now" id="nav-btn_signup_now">سجل الآن</a>
                            </div>
                            <hr>
                        @endif
                    @else
                        @if (Auth::user()->type == 'admin')
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.dash') }}" style="color: white; font-size: 21px;"
                                    target="blank" class="search-button mx-3"> <i class="fas fa-home"></i>
                                </a>
                                <hr>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('user.profile') }}"
                                    style="    color: white;
                            font-size: 21px;" target="blank"
                                    class="search-button mx-3"> <i class="fas fa-user"></i>
                                </a>
                                <hr>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <a class="dropdown-item search-button" style="color: white;font-size: 21px;"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i>
                            </a>
                            <hr>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endif

                    {{-- <div>
                        <input type="checkbox" class="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox-label">
                            <img class="moon" src="{{ asset('assets/images/mon.svg') }}" alt="">
                            <img class="sun" src="{{ asset('assets/images/sun.svg') }}" alt="">
                            <span class="ball"></span>
                        </label>
                    </div> --}}

                </div>
            </nav>
            <div class="row">
                <div class="col-lg-7 col-sm-12">
                    <div class="advantages-content">
                        <div class="letter">
                            <div class="first-text-main">
                                <strong style="color: white;">من</strong>
                                <strong class="service">الإبداع</strong>
                                <strong style="color: white;">الى</strong>
                                <strong class="package">الإنجاز</strong>
                            </div>
                            <div class="secand-text">
                                <strong class="text-under-text-main">نحن شريكك في النجاح</strong>
                            </div>
                        </div>
                        <p class="header-desc" style="color: white;">
                            احجز مكانك و احصل على أفضل النتائج لعلامتك التجارية , نحن ايكويك ك أفضل شركة تسويق رقمي و إعلان نقدم حلول التسويق الرقمي لتتمكن الشركات من المنافسة و النمو عبر الإنترنت 

                        </p>
                        <div class="bottons-container d-flex">
                            <div>
                                <a class="btn register-now nav-btn_sign_now" id="nav-btn_sign_now_home">سجل دخول</a>
                            </div>
                            <div class="text-center">
                                <p class="text-center-btn">او</p>
                            </div>
                            <div>
                                <a class="btn login-button" id="nav-btn_signup_now_home">سجل الآن</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-sm-12">
                    <div class="images-container">
                        <img src="{{ asset('assets/images/dash2.png') }}" alt="target">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end new div -->

    <!-- Start Advantages -->
    <section class="advantages" id="advantages">

        <div class="container">
            <div class="">
                <h2 class="main-title advantages-title text-white mb">مميزاتنا</h2>
            </div>
            <div class="responsive-desc">
                <p class="mb-5 col-sm-10">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                    النص العربى،
                    حيث يمكنك أن
                    تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-4 d-flex justify-content-center">
                    <div class="box my-4 d-flex align-items-start  justify-content-start">
                        <div class="right">
                            <div class="card img-rotate">
                                <img src="assets/images/advantages/target 1 (1).svg" alt="target">
                                <div class="card-title pe-4">متابعه العميل</div>
                                <p class="m-0 pe-4"> دعم واستجابة فورية عبر منصة الشركة</>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 d-flex justify-content-center">
                    <div class="box my-4 d-flex align-items-center justify-content-center gap-1 w-75">
                        <div class="right">
                            <div class="card img-rotate">
                                <img src="assets/images/advantages/Frame 1000001484 (2).svg" alt="fast-time">
                                <div class="card-title pe-4">السرعة</div>
                                <p class="m-0 pe-4">دعم واستجابة فورية عبر منصة الشركة</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 d-flex justify-content-center media-advantege">
                    <div class="box my-4 d-flex justify-content-center align-items-center gap-1 w-75">
                        <div class="right ">
                            <div class="card img-rotate top-right">
                                <img src="assets/images/advantages/Frame 1000001484 (3).svg" width="80px"
                                    height="80px" alt="contact">
                                <div class="card-title pe-4">متابعة العميل</div>
                                <p class="ml-0 pe-4">تفاصيل تفاصيل</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Advantages -->

    <!-- Start what we offer -->

    <section class="offer d-flex justify-content-center align-items-center" id="offer">
        <div class="offer-content">
            <div class="container">
                <div class="container-main-title mt-5">
                    <h2 class="main-title advantages-title text-white text-center" style="line-height: 3px;">ما نقدمه</h2>
                </div>
                <p class="text-center mt-5 mb-5" style="color: #FFFFFF;">المجالات التي تشملها خدماتنا وباقاتنا</p>

                <div class="row">
                    <div class="col-sm-12 col-lg-6 d-flex justify-content-center">
                        <div class="box my-4 d-flex align-items-start  justify-content-start">
                            <div class="right">
                                <div class="card-content-offer d-flex">
                                    <div class="content-img-offer">
                                        <img src="assets/images/advantages/coding 1.svg" alt="target">
                                    </div>
                                    <div class="conten-text-offer">
                                        <div class="card-title"> تصميم تطبيقات الموبايل</div>
                                        <div>
                                            <p class="pe-4"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                                                <p />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr">
                        <hr>
                    </div>

                    <div class="col-sm-12 col-lg-6 d-flex justify-content-center">
                        <div class="box my-4 d-flex align-items-start  justify-content-start">
                            <div class="right">
                                <div class="card-content-offer d-flex">
                                    <div class="content-img-offer">
                                        <img src="assets/images/advantages/apps 1.svg" alt="target">
                                    </div>
                                    <div class="conten-text-offer">
                                        <div class="card-title"> تصميم تطبيقات الويب</div>
                                        <div>
                                            <p class="pe-4"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                                                <p />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vl"></div>
                    <hr>

                    <div class="col-sm-12 col-lg-6 d-flex justify-content-center">
                        <div class="box my-4 d-flex align-items-start  justify-content-start">
                            <div class="right">
                                <div class="card-content-offer d-flex">
                                    <div class="content-img-offer">
                                        <img src="assets/images/advantages/startup 1.svg" alt="target">
                                    </div>
                                    <div class="conten-text-offer">
                                        <div class="card-title"> تصميم تطبيقات الويب</div>
                                        <div>
                                            <p class="pe-4"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                                                <p />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr">
                        <hr>
                    </div>

                    <div class="col-sm-12 col-lg-6 d-flex justify-content-center mb-5">
                        <div class="box my-4 d-flex align-items-start  justify-content-start">
                            <div class="right">
                                <div class="card-content-offer d-flex">
                                    <div class="content-img-offer">
                                        <img src="assets/images/advantages/immersive 1.svg" alt="target">
                                    </div>
                                    <div class="conten-text-offer">
                                        <div class="card-title"> تصميم تطبيقات الويب</div>
                                        <div>
                                            <p class="pe-4"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                                                <p />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- End offer -->

    @include('front.vendor.service-home')
    @include('front.vendor.package-home')


    <!-- Start Contact Us -->

    <section class="contact-us" id="contact-us">
        <div class="contact-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-5 form-contact-us">
                            <div class="container-main-title mt-5 mb-5">
                                <h2 class="main-title advantages-title text-white text-right" style="line-height: 3px;">
                                    تواصل معنا</h2>
                            </div>
                            <p class="mb-5 text-right text-contact-us-responsive">هذا النص هو مثال لنص يمكن أن يستبدل في
                                نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>
                            <form method="post" id="contact_form" action="{{ route('contactstore') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" id="name" name="name" placeholder="الإسم"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="invalid-feedback1" class="badge bg-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <input type="email" id="email" name="email" placeholder="البريد الإلكتروني"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="invalid-feedback3" class="badge bg-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="phone" name="phone" placeholder="رقم الهاتف"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="invalid-feedback2" class="badge bg-danger"></div>
                                </div>
                                <textarea class="form-control" id="message" name="message" placeholder="محتوى الرسالة" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <div id="invalid-feedback4" class="badge bg-danger"></div>
                                <div class="spinner-border text-success mt-2 d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <button type="submit" class="btn-form-contact-us">إرسال</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 d-md-block" style="float: left;">
                        <div class="img-contact-us">
                            <img src="/assets/images/contact-us/contact-us.svg" alt="contact-us">
                        </div>

                        <div class="title-img-contact-us text-white">
                            <div class="img-email d-flex">
                                <p>info@iquick.site</p>
                                <img src="/assets/images/contact-us/phone.svg" alt="email">
                            </div>

                            <div class="img-phone d-flex">
                                <p>+965 254 542 987</p>
                                <img src="/assets/images/contact-us/email.svg" alt="phone">
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- End Contact Us -->

@endsection

@section('ajax_front')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('#contact_form').on('submit', function(e) {
            alert('hi');
            e.preventDefault();
            $("#btnSubmit").attr("disabled", true);
            const name = $('#name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const message = $('#message').val();

            let url = $(this).attr('action');
            console.log(url)
            $.ajax({
                // url: `{{ url('contactstore') }}`,
                url: url,
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    phone: phone,
                    message: message,
                },
                beforeSend: function() {
                    $('.spinner-border').removeClass('d-none')
                },
                success: function(result) {
                    //console.log(result);
                    $("#btnSubmit").attr("disabled", false);
                    swal(result.success, {
                        icon: "success",
                    });
                    $("#contact_form")[0].reset();
                    $('#invalid-feedback1').text('');
                    $('#invalid-feedback2').text('');
                    $('#invalid-feedback3').text('');
                    $('#invalid-feedback4').text('');
                },
                error: function(errorsub) {
                    $("#btnSubmit").attr("disabled", false);
                    if (errorsub) {
                        if (errorsub.responseJSON.errors.name) {
                            $('#invalid-feedback1').text('');
                            $('#invalid-feedback1').append(errorsub.responseJSON.errors.name);
                        } else {
                            $('#invalid-feedback1').text('');
                        }
                        if (errorsub.responseJSON.errors.email) {
                            $('#invalid-feedback2').text('');
                            $('#invalid-feedback2').append(errorsub.responseJSON.errors.email);
                        } else {
                            $('#invalid-feedback2').text('');
                        }
                        if (errorsub.responseJSON.errors.phone) {
                            $('#invalid-feedback3').text('');
                            $('#invalid-feedback3').append(errorsub.responseJSON.errors.phone);
                        } else {
                            $('#invalid-feedback3').text('');
                        }
                        if (errorsub.responseJSON.errors.message) {
                            $('#invalid-feedback4').text('');
                            $('#invalid-feedback4').append(errorsub.responseJSON.errors.message);
                        } else {
                            home.blade
                            $('#invalid-feedback4').text('');
                        }
                    }
                },
                complete: function() {
                    $('.spinner-border').addClass('d-none')
                },
            });
        });

        const xmarknav = document.getElementById('xmarx-closnav');
        const navbar = document.getElementById('navbarSupportedContent');

        xmarknav.addEventListener('click', () => {
            navbar.classList.remove('show');
        })

    </script>
@endsection
