{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
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
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@lang('admin.profiles')</title>
    @if (isset($_COOKIE['mode']) && $_COOKIE['mode'] != 'dark')
        <link rel="icon" type="image/x-icon" href="{{ asset('admin/light/img/favicon.ico') }}" />
        <link href="{{ asset('admin/light/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('admin/light/assets/js/loader.js') }}"></script>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('admin/light/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/light/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL admin/light/PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('admin/light/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/light/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL admin/light/PLUGINS/CUSTOM STYLES -->
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('admin/light/assets/css/elements/custom-pagination.css') }}" rel="stylesheet"
            type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('admin/light/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/light/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLE -->
        <link href="{{ asset('admin/light/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin/light/plugins/editors/markdown/simplemde.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/light/plugins/select2/select2.min.css') }}">
        <!-- END PAGE LEVEL STYLE -->
        <!-- BEGIN PAGE LEVEL STYLE -->
        <link href="{{ asset('admin/light/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('admin/light/plugins/fullcalendar/custom-fullcalendar.advance.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('admin/light/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/light/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('admin/light/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- END PAGE LEVEL STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/light/plugins/dropify/dropify.min.css') }}">
        <link href="{{ asset('admin/light/assets/css/users/account-setting.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('admin/dark/img/favicon.ico') }}" />
        <link href="{{ asset('admin/dark/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('admin/dark/assets/js/loader.js') }}"></script>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('admin/dark/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/dark/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL admin/dark/PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('admin/dark/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/dark/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL admin/dark/PLUGINS/CUSTOM STYLES -->
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('admin/dark/assets/css/elements/custom-pagination.css') }}" rel="stylesheet"
            type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('admin/dark/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/dark/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLE -->
        <link href="{{ asset('admin/dark/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin/dark/plugins/editors/markdown/simplemde.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/dark/plugins/select2/select2.min.css') }}">
        <!-- END PAGE LEVEL STYLE -->
        <!-- BEGIN PAGE LEVEL STYLE -->
        <link href="{{ asset('admin/dark/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('admin/dark/plugins/fullcalendar/custom-fullcalendar.advance.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('admin/dark/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/dark/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
            type="text/css">
        <link href="{{ asset('admin/dark/assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- END PAGE LEVEL STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/dark/plugins/dropify/dropify.min.css') }}">
        <link href="{{ asset('admin/dark/assets/css/users/account-setting.css') }}" rel="stylesheet"
            type="text/css" />
    @endif
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'user' => auth()->check() ? auth()->user()->id : null,
        ]) !!};
    </script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('60aaa4eb1bcf9feef7a2', {
            cluster: 'eu',
        });

        var channel = pusher.subscribe('event-user.'+window.Laravel.user);
        channel.bind('App\\Events\\EventUser', function(data) {
            let order = data;
            console.log(order);
            let html = `<a href="{{ route('user.orders.index') }}" mb-2>
           <div class="dropdown-item">
                            <div class="media">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-message-square">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="media-body">
                                    <div class="notification-para"><span class="user-name">${order['username']}</span> ${order['order_name']}</div>
                                    <div class="notification-meta-time">الحاله ${order['status']}</div>
                                </div>
                            </div>
                        </div>
            </a>`;
            $("#mynotification").append(html);
            $('.notification-dropdown').addClass('show');
            $('#notificationDropdown').attr('aria-expanded', 'true');
            $('#mydatanotif').addClass('show');
        });
    </script>
    <!--== fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" type="text/css" />
    @livewireStyles
    @yield('css')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            menubar: true,
            setup: (editor) => {
                // Apply the focus effect
                editor.on("init", () => {
                    editor.getContainer().style.transition =
                        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
                });
                editor.on("focus", () => {
                    (editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                    (editor.getContainer().style.borderColor = "#80bdff");
                });
                editor.on("blur", () => {
                    (editor.getContainer().style.boxShadow = ""),
                    (editor.getContainer().style.borderColor = "");
                });
            },
        });
        tinymce.init({
            selector: '#mytextarea1',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            menubar: true,
            setup: (editor) => {
                // Apply the focus effect
                editor.on("init", () => {
                    editor.getContainer().style.transition =
                        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
                });
                editor.on("focus", () => {
                    (editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                    (editor.getContainer().style.borderColor = "#80bdff");
                });
                editor.on("blur", () => {
                    (editor.getContainer().style.boxShadow = ""),
                    (editor.getContainer().style.borderColor = "");
                });
            },
        });
        tinymce.init({
            selector: '#mytextarea2',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            menubar: true,
            setup: (editor) => {
                // Apply the focus effect
                editor.on("init", () => {
                    editor.getContainer().style.transition =
                        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
                });
                editor.on("focus", () => {
                    (editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                    (editor.getContainer().style.borderColor = "#80bdff");
                });
                editor.on("blur", () => {
                    (editor.getContainer().style.boxShadow = ""),
                    (editor.getContainer().style.borderColor = "");
                });
            },
        });
    </script>

</head>

<body class="alt-menu sidebar-noneoverflow">
    <div class="container p-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                <div class="d-flex">
                    <a href="{{ route('user.register/profile') }}" class="btn btn-warning mb-2">@lang('admin.skip')</a>
                </div>
                <form action="{{ route('user.register/profile/store') }}" method="post" enctype="multipart/form-data"
                    class="section general-info">
                    @csrf
                    <div class="info">
                        <div class="row">
                            <div class="col-lg-11 mx-auto">
                                @include('general-components.admin.message')
                                <div class="row">
                                    <div class="col-xl-2 col-lg-12 col-md-4 mx-auto mb-3">
                                        <div class="upload mt-4 pr-md-4">
                                            <input type="file" id="input-file-max-fs" name="file" class="dropify"
                                                data-default-file="{{ asset('admin/dark/assets/img/200x200.jpg') }}"
                                                data-max-file-size="2M" />
                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>@lang('user.profile_image')
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="{{__('admin.name')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group">
                                                    <input type="url" name="link" value="{{ old('link') }}" class="form-control"
                                placeholder="{{__('user.link')}}">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <input type="submit" name="submit" value="{{ __('admin.add_new_profile') }}"
                                        class="btn btn-primary mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (isset($_COOKIE['mode']) && $_COOKIE['mode'] != 'dark')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/light/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/light/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/light/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('admin/light/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL admin/light/PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/light/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL admin/light/PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/light/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/light/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/editors/markdown/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/select2/select2.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{ asset('admin/light/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('admin/light/assets/js/users/account-settings.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@else
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/dark/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/dark/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/dark/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('admin/dark/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL admin/dark/PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/dark/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL admin/dark/PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/dark/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/dark/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/editors/markdown/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/select2/select2.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="{{ asset('admin/dark/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('admin/dark/assets/js/users/account-settings.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
@endif
<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    var firstUpload = new FileUploadWithPreview('myFirstImage1')
    var firstUpload = new FileUploadWithPreview('myFirstImage2')
    var firstUpload = new FileUploadWithPreview('myFirstImage3')
</script>
<script>
    $(".tagging").select2({
        tags: true
    });
    var Selector = {
        mainHeader: '.header.navbar',
        headerhamburger: '.toggle-sidebar',
        fixed: '.fixed-top',
        mainContainer: '.main-container',
        sidebar: '#sidebar',
        sidebarContent: '#sidebar-content',
        sidebarStickyContent: '.sticky-sidebar-content',
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: '#content',
        contentWrapperContent: '.container',
        mainContentArea: '.main-content',
        searchFull: '.toggle-search',
        overlay: {
            sidebar: '.overlay',
            cs: '.cs-overlay',
            search: '.search-overlay'
        }
    };
    $('.sidebarCollapse').on('click', function(sidebar) {
        sidebar.preventDefault();
        getSidebar = $('.sidebar-wrapper');
        if ($('.collapse.submenu').hasClass('show')) {
            $('.submenu.show').addClass('mini-recent-submenu');
            getSidebar.find('.collapse.submenu').removeClass('show');
            getSidebar.find('.collapse.submenu').removeClass('show');
            $('.collapse.submenu').parents('li.menu').find('.dropdown-toggle').attr('aria-expanded',
                'false');
        } else {
            if ($(Selector.mainContainer).hasClass('sidebar-closed')) {
                if ($('.collapse.submenu').hasClass('recent-submenu')) {
                    getSidebar.find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                    $('.submenu').removeClass('mini-recent-submenu');

                } else {
                    $('li.active .submenu').addClass('recent-submenu');
                    getSidebar.find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                    $('.submenu').removeClass('mini-recent-submenu');
                }
            }
        }
        $(Selector.mainContainer).toggleClass("sidebar-closed");
        $(Selector.mainHeader).toggleClass('expand-header');
        $(Selector.mainContainer).toggleClass("sbar-open");
        $('.overlay').toggleClass('show');
        $('html,body').toggleClass('sidebar-noneoverflow');
    });
    $('.sidebar-wrapper').on('mouseenter mouseleave', function(event) {
        event.preventDefault();
        if ($('body').hasClass('alt-menu')) {
            if ($('.main-container').hasClass('sidebar-closed')) {
                if (event.type === 'mouseenter') {
                    $('li .submenu').removeClass('show');
                    $('li.active .submenu').addClass('recent-submenu');
                    $('li.active').find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                } else if (event.type === 'mouseleave') {
                    $('li').find('.collapse.submenu').removeClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'false');
                    $('.collapse.submenu').parents('.menu').find('.dropdown-toggle').attr('aria-expanded',
                        'false');
                }
            }
        } else {
            if ($('.main-container').hasClass('sidebar-closed')) {
                $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                    'aria-expanded', 'true');
                $(this).find('.submenu.recent-submenu').toggleClass('show');
            }

        }
    });
    $('.sidebar-wrapper').off('mouseenter mouseleave');
    $('#dismiss, .overlay, cs-overlay').on('click', function() {
        // hide sidebar
        $(Selector.mainContainer).addClass('sidebar-closed');
        $(Selector.mainContainer).removeClass('sbar-open');
        // hide overlay
        $('.overlay').removeClass('show');
        $('html,body').removeClass('sidebar-noneoverflow');
    });
</script>

@include('sweetalert::alert')

@yield('ajax')

@livewireScripts
<div class="pubble-app" data-app-id="116836" data-app-identifier="116836"></div>

<!-- inject js start -->

<script type="text/javascript" src="https://cdn.chatify.com/javascript/loader.js" defer></script>
</body>

</html> --}}
