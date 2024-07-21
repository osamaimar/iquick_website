<header class="wrapper">
  <nav class="navbar navbar-expand-lg classic transparent">
      <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand me-8">
              <a href="{{route('home')}}">
              <img src="{{asset('assets/img/logo.png')}}" srcset="{{asset('assets/img/logo@2x.png')}} 2x" alt="" style="height: 50px"/>
              </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
              <div class="offcanvas-header d-lg-none">
                  <a href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" srcset="{{asset('assets/img/logo@2x.png')}} 2x" alt="" style="height: 50px"/></a>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body d-flex flex-column h-100">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link fs-lg {{ request()->routeIs('home')? 'active' : ''}}" href="{{route('home')}}">الرئيسية</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-lg" href="{{route('home')}}#features">مميزاتنا</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-lg {{ request()->routeIs('service')? 'active' : ''}}" href="{{route('service')}}">الخدمات</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-lg {{ request()->routeIs('package')? 'active' : ''}}" href="{{route('package')}}">الباقات</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-lg" href="{{route('home')}}#contact">تواصل معنا</a>
                      </li>
                      @auth 
                      <li class="nav-item d-block d-md-none">
                            <a href="{{route('user.profile')}}" class="nav-link">لوحة التحكم</a>
                        </li>
                        <li class="nav-item d-block d-md-none">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                @method('post')

                                <button type="submit" class="nav-link bg-transparent border-0" >تسجيل الخروج</button>
                            </form>
                        </li>    
                      @else
                      <li class="nav-item d-block d-md-none">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-signin">تسجيل الدخول</a>
                        </li>
                        <li class="nav-item d-block d-md-none">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal-signup">إنشاء حساب</a>
                        </li>
                      @endif

                  </ul>
                  <!-- /.navbar-nav -->
              </div>
              <!-- /.offcanvas-body -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other ms-lg-4">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                    @auth 

                        <li class="nav-item d-none d-md-block">
                            <a href="{{route('user.profile')}}" class="btn btn-md btn-white rounded me-2">لوحة التحكم</a>
                        </li>
                        <li class="nav-item d-none d-md-block">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                @method('post')

                                <button type="submit" class="btn btn-md btn-outline-white rounded">تسجيل الخروج</button>
                            </form>
                        </li>                  
                    @else
                        <li class="nav-item d-none d-md-block">
                            <a class="btn btn-md btn-white rounded me-2" data-bs-toggle="modal" data-bs-target="#modal-signin">تسجيل الدخول</a>
                        </li>
                        <li class="nav-item d-none d-md-block">
                            <a class="btn btn-md btn-outline-white rounded" data-bs-toggle="modal" data-bs-target="#modal-signup">إنشاء حساب</a>
                        </li>
                    @endif

                  <li class="nav-item d-lg-none">
                      <button class="hamburger offcanvas-nav-btn text-white"><span></span></button>
                  </li>
              </ul>
              <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
      </div>
      <!-- /.container -->
  </nav>
  <!-- /.navbar -->
<!-- Snap Pixel Code -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

snaptr('init', 'fe6132b6-005f-410a-a9fe-c5254e8d3cf4', {
'user_email': '__INSERT_USER_EMAIL__'
});

snaptr('track', 'PAGE_VIEW');

</script>
<!-- End Snap Pixel Code -->
</header>
<div class="modal fade" id="modal-signin" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
          <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h2 class="mb-3 text-start">مرحبا مجددا</h2>
              <p class="lead mb-6 text-start">قم بادخال بريدك الالكتروني وكلمة السر لتسجيل الدخول</p>
              <form class="text-start mb-3" action="{{ route('login') }}" method="POST">
                @csrf
                @method('post')
                  <div class="form-floating mb-4">
                      <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" id="loginEmail" style="background: #C5CAE6; color: #000">
                      <label for="loginEmail" style="color: #7074A9">البريد الإلكتروني</label>
                      @error('email')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <div class="form-floating password-field mb-4">
                      <input type="password" name="password" class="form-control" placeholder="كلمة السر" id="loginPassword" style="background: #C5CAE6; color: #000">
                      <span class="password-toggle"><i class="uil uil-eye"></i></span>
                      <label for="loginPassword" style="color: #7074A9">كلمة السر</label>
                      @error('password')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <button type="submit" class="btn rounded btn-login w-100 mb-2 text-white" style="background: #150B36; border: 0">قم بالتسجيل</button>
              </form>
              <!-- /form -->
              <p class="mb-1"><a id="forgot-password-btn" href="#" class="hover text-white">نسيت كلمة المرور؟</a></p>
              <p class="mb-0 text-muted">لاتمتلك حسابا بعد؟ <a href="#" data-bs-target="#modal-signup" data-bs-toggle="modal" data-bs-dismiss="modal" class="hover text-white">إنشاء حساب</a></p>
          </div>
          <!--/.modal-content -->
      </div>
      <!--/.modal-body -->
  </div>
  <!--/.modal-dialog -->
</div>
<!--/.modal -->
<div class="modal fade" id="modal-signup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content text-center">
          <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <h2 class="mb-3 text-start">إنشاء حساب</h2>
              <p class="lead mb-6 text-start">سيأخذ هذا وقتا قصيرا.</p>
              <form class="text-start mb-3" action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="form-floating mb-4">
                      <input type="text" class="form-control" name="firstname" placeholder="الإسم الأول" id="loginName" style="background: #C5CAE6; color: #000">
                      <label for="loginName" style="color: #7074A9">الإسم الأول</label>
                      @error('firstname')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <div class="form-floating mb-4">
                      <input type="text" class="form-control" name="lastname" placeholder="الإسم الأخير" id="loginName" style="background: #C5CAE6; color: #000">
                      <label for="loginName" style="color: #7074A9">الإسم الأخير</label>
                      @error('lastname')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <div class="form-floating mb-4">
                      <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" id="loginEmail" style="background: #C5CAE6; color: #000">
                      <label for="loginEmail" style="color: #7074A9">البريد الإلكتروني</label>
                      @error('email')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <div class="form-floating password-field mb-4">
                      <input type="password" class="form-control" name="password" placeholder="كلمة المرور" id="loginPassword" style="background: #C5CAE6; color: #000">
                      <span class="password-toggle"><i class="uil uil-eye"></i></span>
                      <label for="loginPassword" style="color: #7074A9">كلمة المرور</label>
                      @error('password')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <div class="form-floating password-field mb-4">
                      <input type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة المرور" id="loginPasswordConfirm" style="background: #C5CAE6; color: #000">
                      <span class="password-toggle"><i class="uil uil-eye"></i></span>
                      <label for="loginPasswordConfirm" style="color: #7074A9">تأكيد كلمة المرور</label>
                      @error('password_confirmation')
                      <div class="invalid-feedback d-flex"> 
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                  <button type="submit" class="btn text-white rounded btn-login w-100 mb-2" style="background: #150B36; border: 0">إنشاء حساب</button>
              </form>
              <!-- /form -->
              <p class="mb-0 text-muted">تمتلك حسابا بالفعل؟ <a href="#" data-bs-target="#modal-signin" data-bs-toggle="modal" data-bs-dismiss="modal" class="hover text-white">تسجيل الدخول</a></p>
          </div>
          <!--/.modal-content -->
      </div>
      <!--/.modal-body -->
  </div>
  <!--/.modal-dialog -->
</div>
<!--/.modal -->
