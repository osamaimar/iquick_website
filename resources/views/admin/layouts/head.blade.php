<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @if (isset($_COOKIE['mode']) && $_COOKIE['mode'] != 'dark')
        <link rel="icon" type="image/x-icon" href="{{ asset('assets\images\man.png') }}" />
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
        <link href="{{ asset('admin/light/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLE -->
        <!-- END PAGE LEVEL STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/light/plugins/dropify/dropify.min.css') }}">
        <link href="{{ asset('admin/light/assets/css/users/account-setting.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('admin/light/assets/css/apps/mailing-chat.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/light/assets/css/forms/switches.css')}}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('assets\images\man.png') }}" />
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
        <link href="{{ asset('admin/dark/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLE -->
        <!-- END PAGE LEVEL STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/dark/plugins/dropify/dropify.min.css') }}">
        <link href="{{ asset('admin/dark/assets/css/users/account-setting.css') }}" rel="stylesheet"
            type="text/css" />
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('admin/dark/assets/css/apps/mailing-chat.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/dark/assets/css/forms/switches.css')}}">
        <style>
            .swal-modal{
                background: #1b2e4b !important;
                box-shadow: 0 0 20px 0 #0f1223 !important;
            }
            .swal-icon--success:after, .swal-icon--success:before{
                background: #1b2e4b !important;
            }
            .swal-icon--success__hide-corners{
                background: #1b2e4b !important;
            }
            .swal-title{
                color: white !important;
            }
            .swal-text{
                color: white !important;
            }
            .swal-button{
                border: none !important;
                background-color: #f6f6f6 !important;
                color:#000 !important;
            }
            .swal-icon--success__line{
                background-color: #e9eaeb !important;
            }
            .swal-icon--success__ring{
                border: 4px solid hsl(210deg 4.76% 91.76%) !important;
            }
        </style>
        <style>
            .swal2-modal{
                background: #1b2e4b !important;
                box-shadow: 0 0 20px 0 #0f1223 !important;
            }
            .swal2-icon--success:after, .swal2-icon--success:before{
                background: #1b2e4b !important;
            }
            .swal2-icon--success__hide-corners{
                background: #1b2e4b !important;
            }
            .swal2-title{
                color: white !important;
            }
            .swal2-text{
                color: white !important;
            }
            .swal2-button{
                border: none !important;
                background-color: #f6f6f6 !important;
                color:#000 !important;
            }
            .swal2-icon--success__line{
                background-color: #e9eaeb !important;
            }
            .swal2-icon--success__ring{
                border: 4px solid hsl(210deg 4.76% 91.76%) !important;
            }
        </style>
    @endif
    <!--== fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'user' => auth()->check() ? auth()->user()->id : null,
            'type_user' => auth()->check() ? auth()->user()->type_user : null,
        ]) !!};
    </script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('60aaa4eb1bcf9feef7a2', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('App\\Events\\MyEvent', function(data) {
            if(window.Laravel.type_user!="1"){
                var audio = new Audio('https://iquick.site/notice.mp3'); 
                audio.play();
                let order = data;
                let html = `<a href="https://iquick.site/dashborad/orders/${order['order_id']}" class="d-block mb-2" >
            <div class="dropdown-item bg-info p-2 rounded">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-message-square">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <div class="media-body">
                                        <div class="notification-para"><span class="user-name">${order['username']}</span> ${order['order_code']}</div>
                                        <div class="notification-meta-time">${order['messages']}</div>
                                        <div class="notification-meta-time">${order['type_order']}</div>
                                    </div>
                                </div>
                            </div>
                </a>`;
                $("#mynotification").append(html);
                $('.notification-dropdown').addClass('show');
                $('#notificationDropdown').attr('aria-expanded', 'true');
                $('#mydatanotif').addClass('show');
            }else{
                if(window.Laravel.type_user==data.employee_type&&window.Laravel.user==data.employee_id){
                    var audio = new Audio('https://iquick.site/notice.mp3'); 
                    audio.play();
                    let order = data;
                    let html = `<a href="https://iquick.site/dashborad/orders/${order['order_id']}" class="d-block mb-2" >
                <div class="dropdown-item bg-info p-2 rounded">
                                    <div class="media">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-message-square">
                                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                        <div class="media-body">
                                            <div class="notification-para"><span class="user-name">${order['username']}</span> ${order['order_code']}</div>
                                            <div class="notification-meta-time">${order['messages']}</div>
                                            <div class="notification-meta-time">${order['type_order']}</div>
                                        </div>
                                    </div>
                                </div>
                    </a>`;
                    $("#mynotification").append(html);
                    $('.notification-dropdown').addClass('show');
                    $('#notificationDropdown').attr('aria-expanded', 'true');
                    $('#mydatanotif').addClass('show');
                }
            }
        });
        var channel = pusher.subscribe('my-contact');
        channel.bind('App\\Events\\MyEventContact', function(data) {
            var audio = new Audio('https://iquick.site/notice.mp3'); 
            audio.play();
            let contact = data;
            let html = `<a href="{{ route('admin.contacts.index') }}" class="dropdown-item item_count d-block mb-2">
                            <div class="bg-warning p-2 rounded">
                                <div class="media notification-new">
                                    <div class="notification-icon">
                                        <div class="icon-svg mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="meta-title mr-3">${data['username']}</p>
                                        <p class="message-text">${data['email']}</p>
                                        <p class="align-self-center mb-0">${data['message']}</p>
                                    </div>
                                </div>
                            </div>
                        </a>`;
            $("#mymessage").append(html);
            $('.message-dropdown').addClass('show');
            $('#messageDropdown').attr('aria-expanded', 'true');
            $('#mydatanmessage').addClass('show');
            let item_count = $('.item_count').length;
            $("#addcount").text(item_count);
        });
    </script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('60aaa4eb1bcf9feef7a2', {
            cluster: 'eu',
        });
        
        var channel = pusher.subscribe('event-user-attach.'+window.Laravel.user);
        channel.bind('App\\Events\\EventUserAttach', function(data) {
            var audio = new Audio('https://iquick.site/notice.mp3'); 
            audio.play();
            let attach = data;
            let html = `<a href="{{ route('admin.assignedtasks.index') }}" class="d-block mb-2" >
           <div class="dropdown-item bg-info p-2 rounded">
                            <div class="media">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-message-square">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="media-body">
                                    <div class="notification-para"><span class="user-name">${attach['filed_name']}</span></div>
                                    <div class="notification-para">${attach['messages']}</div>
                                    <div class="notification-para">${attach['attchname']}</div>
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
    <link href="{{ asset('assets/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css" />
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
    <style>
        .count-response{
            width: 20px;
            display: inline-block;
            height: 20px;
            background: #e39a14;
            color: white;
            border-radius: 50%;
            font-size: 12px;
            margin-right: 34px;
            position: relative;
        }
        .response-count{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            color: white;
        }
        .solve_menu_problem{
            height: 148px !important;
            overflow: auto !important;
        }
    </style>
</head>

<body class="alt-menu sidebar-noneoverflow">
