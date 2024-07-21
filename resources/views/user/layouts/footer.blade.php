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
<style>
:root {
  --primary: #191e3a;
  --secondary: #25d4e3;
  --white: #ffffff;
  --prim20: #d1d2d8;
  --bg: #e9eaeb;
  --sec1: #f3f5f5;
  --gray: #a5a5a5;
  --second10: #e1f2f4;
  --third: #e19809;
  --third10: #f3ecde;
  --third1: #f5f4f3;
  --star: #f7cb15;
  --white_blue: #f5f7fb;
  --input: #333645;
  /* transitions */
  --trans-3: 0.3s ease-in-out;
  --trans-5: 0.5s ease-in-out;
}
  /* Start Chat */
.chat {
  position: fixed;
  bottom: 70px;
  right: 60px;
  z-index: 999999;
}
.chat-btn {
  position: fixed;
  bottom: 45px;
  right: 50px;
  z-index: 999999;
  cursor: pointer;
  transition: var(--trans-5);
}
.chat-btn.open {
  transform: rotate(-180deg);
  opacity: 0.7;
}
.card-container.show {
  height: auto;
}
.card-container.show .chat-card {
  max-height: 390px;
  opacity: 1;
}
.chat .card-container {
  position: absolute;
  top: 0;
  right: 50px;
  transform: translateY(-105%);
}
.chat .chat-card {
  position: relative;
  height: 390px;
  opacity: 0;
  max-height: 0;
  background-color: var(--white);
  box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.25);
  width: 328px;
  border-radius: 10px;
  overflow: hidden;
  transition: max-height var(--trans-5), opacity var(--trans-5);
}
.chat .card-head {
  background-color: var(--third);
  color: var(--white);
  width: 100%;
  padding: 15px 0;
  text-align: center;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
  font-weight: 500;
}
.chat .chat-body {
  padding: 7px 12px;
  padding-bottom: 60px;
  max-height: 345px;
  overflow-y: auto;
}
.chat .chat-body::-webkit-scrollbar {
  width: 5px;
  background-color: var(--white);
}
.chat .chat-body::-webkit-scrollbar-thumb {
  width: 5px;
  background-color: var(--prim20);
}
.chat .chat-body .right,
.chat .chat-body .left {
  padding-top: 10px;
  font-size: 10px;
}
.chat .chat-body .right .user-name,
.chat .chat-body .left .user-name {
  font-size: 12px;
  margin: 0;
}
.chat .chat-body .right .massage,
.chat .chat-body .left .massage {
  background-color: var(--sec1);
  color: var(--primary);
  border-radius: 10px;
  padding: 5px 15px;
  font-size: 10px;
  margin-top: 5px;
  margin-bottom: 0;
  word-break: break-word;
}
.chat .chat-body .right .time,
.chat .chat-body .left .time {
  font-size: 8px;
  color: var(--gray);
}
.chat .chat-body .left {
  text-align: left;
}
.chat .chat-body .right {
  text-align: right;
}

.chat .chat-footer {
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 100%;
  background-color: var(--white);
  padding: 10px 0;
  transform: translateX(-50%);
  z-index: 999999;
}
.chat .chat-footer form {
  display: flex;
  align-items: center;
  gap: 7px;
  margin-right: 20px;
}
.chat .chat-footer .send {
  position: relative;
}
.assets {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
.chat .chat-footer .send-btn {
  background-color: var(--third);
  display: flex;
  align-items: center;
  justify-content: center;
  width: 52px;
  height: 34px;
  border-radius: 5px;
  border: none;
  visibility: hidden;
}
.chat .chat-footer .emoji-img {
  cursor: pointer;
}
.chat .chat-footer .message {
  position: relative;
  width: 100%;
}

.chat .chat-footer .message-input {
  border: none;
  border-bottom: 1px solid var(--prim20);
  outline: none;
  font-weight: 500;
  width: 88%;
}

.chat .chat-footer .message-input::placeholder {
  color: var(--prim20);
}
.assets.hide {
  visibility: hidden !important;
}
.send-btn.show {
  visibility: visible !important;
}
/* End Chat */

@media screen and (max-width: 767px) {
  .chat .card-container {
    right: -35px;
  }
  .chat-btn {
    right: 20px;
    bottom: 20px;
  }
}

</style>

<script>
    const message_input = document.getElementById("message-input"),
  assets = document.getElementById("assets"),
  send_btn = document.getElementById("send-btn"),
  chat_btn = document.getElementById("chat-btn"),
  chat = document.getElementById("chat");
/*
! **********  chat  ********** !
*/
//  Add And Remove Classes From Chat
document.addEventListener("click", (e) => {
  if (e.target.closest("#chat-btn")||e.target.closest(".helper")||e.target.closest(".chatproblem")) {
    chat_btn.classList.add("open");
    chat.classList.add("show");
  } else if (!e.target.closest("#chat-btn") && !e.target.closest("#chat")) {
    chat_btn.classList.remove("open");
    chat.classList.remove("show");
    // remove classes in button send
    assets.classList.remove("hide");
    send_btn.classList.remove("show");
  }
});
message_input.addEventListener("focus", () => {
  assets.classList.add("hide");
  send_btn.classList.add("show");
});
chat.addEventListener("blur", () => {
  assets.classList.remove("hide");
  send_btn.classList.remove("show");
});
</script>
<script>
    var receiver_id = '';
    var count='';
    var my_id = "{{ Auth::user()->id }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('60aaa4eb1bcf9feef7a2', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-chat');
        channel.bind('App\\Events\\MyChat', function (data) {
            // alert(JSON.stringify(data));
            if(data.to==my_id){
                chat_btn.classList.add("open");
                chat.classList.add("show");
                var audio = new Audio('https://iquick.site/soundchat.mp3'); 
                audio.play();
                if(count===''){
                    count='hello';
                    setTimeout(function() { $( ".message input" ).focus() }, 1000);
                    $.ajax({
                        type: "get",
                        url: `{{url('profile/getMessage')}}`, // need to create this route
                        data: "",
                        cache: false,
                        success: function (data) {
                            $('#chat_card').html(data);
                            
                        }
                    });
                }else{
                    setTimeout(function() { $( ".message input" ).focus() }, 1000);
                    $(".append").append(`
                    <div class="left">
                        <div class="chat-track">
                            <div class="d-flex align-items-center justify-content-end gap-2">
                                <img src="{{asset('assets/images/chat/support.svg')}}" alt="support">
                                <h5 class="user-name" style="color: #3b3f5c;">فريق الدعم</h5>
                            </div>
                            <p class="massage">${data.message}</p>
                            <span class="time">${data.created_at}</span>
                        </div>
                    </div>
                    `);
                }
            setTimeout(function() { $( ".message input" ).focus() }, 1000);
            }else if(data.from==my_id){
                var audio = new Audio('https://iquick.site/soundchat.mp3'); 
                audio.play();
                $(".append").append(`
                    <div class="right">
                        <div class="chat-track">
                            <h5 class="user-name" style="color: #3b3f5c;">أنت</h5>
                            <p class="massage">${data.message}</p>
                            <span class="time">${data.created_at}</span>
                        </div>
                    </div>
                    `);
                setTimeout(function() { $( ".message input" ).focus() }, 1000);
            }
        });

        $('.helper').on('click',function () {
            // $('.person').removeClass('active');
            // $(this).addClass('active');
            // receiver_id = $(this).attr('id');
            setTimeout(function() { $( ".message input" ).focus() }, 1000);
            $.ajax({
                type: "get",
                url: `{{url('profile/getMessage')}}`, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#chat_card').html(data);
                    
                }
            });
        });
        $('.chatproblem').on('click',function () {
            // $('.person').removeClass('active');
            // $(this).addClass('active');
            // receiver_id = $(this).attr('id');
            setTimeout(function() { $( ".message input" ).focus() }, 1000);
            $.ajax({
                type: "get",
                url: `{{url('profile/getMessage')}}`, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#chat_card').html(data);
                    
                }
            });
        });
        $('#chat-btn').on('click',function () {
            // $('.person').removeClass('active');
            // $(this).addClass('active');
            // receiver_id = $(this).attr('id');
            setTimeout(function() { $( ".message input" ).focus() }, 1000);
            $.ajax({
                type: "get",
                url: `{{url('profile/getMessage')}}`, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#chat_card').html(data);
                    
                }
            });
        });

        $(document).on('keypress', '.message input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: `{{url("profile/sendMessage")}}`, // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        
                    }
                })
            }
        });
    });
</script>
{{-- <div class="pubble-app" data-app-id="116836" data-app-identifier="116836"></div> --}}

<!-- inject js start -->

{{-- <script type="text/javascript" src="https://cdn.chatify.com/javascript/loader.js" defer></script> --}}
</body>

</html>
