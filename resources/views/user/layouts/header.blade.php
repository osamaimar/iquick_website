@include('user.layouts.head')
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <img src="{{ asset('assets\img\loader.gif') }}" style="width: 144px" alt="جار التحميل...">
        </div>
    </div>
</div>
<!--  END LOADER -->
<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <a href="#!">
            <img src="{{ asset('assets\images\FINAL-2.png') }}" alt="" style="    width: 100px;
            margin-right: 25px;">
        </a>
        <ul class="navbar-item flex-row ml-auto">
            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg><span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu position-absolute e-animated e-fadeInUp" style="    overflow: auto;
                height: 338px;"
                    aria-labelledby="notificationDropdown" id="mydatanotif">
                    <div class="notification-scroll">
                        <div id="mynotification"></div>
                        <x-messages/>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-user-check">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>

                </a>
                <div class="dropdown-menu position-absolute e-animated e-fadeInUp"
                    aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="<?php 
                                if(Auth::user()->userprofile): 
                                    if(Auth::user()->userprofile->profile_image!=null): 
                                    echo asset('storage/images/userprofile/'.Auth::user()->userprofile->profile_image); 
                                    else: echo asset('assets\images\images.jpg'); 
                                    endif; 
                                else: echo asset('assets\images\images.jpg') ; 
                                endif; ?>" class="img-fluid mr-2"
                                alt="avatar">
                            <div class="media-body">
                                <h5 class="mb-2">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</h5>
                                <p>{{ Auth::user()->code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{ route('user.orders.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                <path
                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                </path>
                            </svg> <span>@lang("admin.orders")</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg> <span>@lang("admin.Log_Out")</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-2">
                <a href="{{route("home")}}" class="nav-link dropdown-toggle user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                </a>
            </li>
            {{-- <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-3">
                <a href="{{ route('user.dark') }}" class="nav-link dropdown-toggle user">
                    <div class="theme-container shadow-dark">
                        <img id="theme-icon"
                            src="https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg"
                            alt="ERR">
                    </div>
                </a>
            </li> --}}
        </ul>
        <!-- Snap Pixel Code -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

snaptr('init', 'fe6132b6-005f-410a-a9fe-c5254e8d3cf4', {
'user_email': '_INSERT_USER_EMAIL_'
});

snaptr('track', 'PAGE_VIEW');

</script>
<!-- End Snap Pixel Code -->

    </header>
</div>
<!--  END NAVBAR  -->
