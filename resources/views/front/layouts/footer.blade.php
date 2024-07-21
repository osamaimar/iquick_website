@php 
  $setting = \App\Models\Setting::first();

  $pages = \App\Models\Page::get();
@endphp

<footer>
  <div class="container pt-13 pt-md-15 pb-7">
      <div class="row gy-6 gy-lg-0">
          <div class="col-lg-4">
              <div class="widget">
                  <div class="navbar-brand">
                      <a href="{{route('home')}}">
                      <img src="{{asset('assets/img/logo.png')}}" srcset="{{asset('assets/img/logo@2x.png')}} 2x" alt="" style="height: 45px"/>
                      </a>
                  </div>
                  <h3 class="h2 mb-3 mt-4">
                    @lang('messages.foo_about_title')                        
                  </h3>
                  <p class="lead mb-5">
                    @lang('messages.foo_about_subtitle')                        
                  </p>
              </div>
              <!-- /.widget -->
          </div>
          <!-- /column -->
          <div class="col-md-4 col-lg-2 offset-lg-2">
              <div class="widget">
                <h4 class="widget-title mb-3">
                  @lang('messages.foo_links')                        
                </h4>
                  <ul class="list-unstyled text-reset mb-0">
                    <li class="nav-item">
                        <a href="{{route('home')}}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home')}}#features">مميزاتنا</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('service')}}">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('package')}}">الباقات</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('home')}}#contact">تواصل معنا</a>
                    </li>
                  </ul>
              </div>
              <!-- /.widget -->
          </div>
          <!-- /column -->
          <div class="col-md-4 col-lg-2">
              <div class="widget">
                  <h4 class="widget-title mb-3">
                    @lang('messages.foo_pages')                        
                  </h4>
                  <ul class="list-unstyled text-reset mb-0">
                      @foreach($pages as $page)
                        <li>
                          <a href="{{route('page', ['page' => $page->id])}}">
                            {{$page->name}}
                          </a>
                        </li>
                      @endforeach
                  </ul>
              </div>
              <!-- /.widget -->
          </div>
          <!-- /column -->
          <div class="col-md-4 col-lg-2">
              <div class="widget">
                  <h4 class="widget-title mb-3">
                    @lang('messages.foo_contact')                        
                  </h4>
                  <address>{{($setting != null) ? $setting->address : ''}}</address>
                  <a class="text-white" href="mailto:{{($setting != null) ? $setting->email : ''}}">{{($setting != null) ? $setting->email : ''}}</a>
                  
                  <nav class="nav social text-md-start">
                      <a href="{{($setting != null) ? $setting->twitter : ''}}"><i class="uil uil-twitter"></i></a>
                      <a href="{{($setting != null) ? $setting->facebook : ''}}"><i class="uil uil-facebook-f"></i></a>
                      <a href="{{($setting != null) ? $setting->insta : ''}}"><i class="uil uil-instagram"></i></a>
                  </nav>
                  <!-- /.social -->
              </div>
              <!-- /.widget -->
          </div>
          <!-- /column -->
      </div>
      <!--/.row -->
      <hr class="mt-13 mt-md-15 mb-7" />
      <div class="d-md-flex align-items-center justify-content-center">
          <p class="mb-2 mb-lg-0">
            @lang('messages.foo_copyright')                        
          </p>
      </div>
      <!-- /div -->
  </div>
  <!-- /.container -->
</footer>

<div class="progress-wrap active-progress">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 202.4;"></path>
  </svg>
</div>