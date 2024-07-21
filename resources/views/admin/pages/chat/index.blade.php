@extends('admin.master')


@section('title', __('admin.chat'))

@section('page-title', __('admin.chat'))

@section('content')
<div class="row" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="chat-system">
            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
            <div class="user-list-box">
                <div class="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="form-control" placeholder="Search" />
                </div>
                <div class="people">

                    @foreach ($users as $user)
                    <div class="person" id="{{$user->id}}" data-chat="person{{$user->id}}">
                        <div class="user-info">
                            <div class="f-head">
                                <img src="@if ($user->profile_image!=null)
                                {{asset('storage/images/userprofile/'.$user->profile_image)}}
                                @else
                                {{asset("assets/images/images.jpg")}}
                                @endif" alt="avatar">
                            </div>
                            <div class="f-body">
                                <div class="meta-info">
                                    <span class="user-name" data-name="Nia Hillyer">{{$user->firstname.' '.$user->lastname}}</span>
                                    <span class="user-meta-time">{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</span>
                                    {{-- @if (Cache::has('user-is-online-' . $user->id))
                                    <span class="user-meta-time">@lang('admin.online')</span>
                                    @else
                                    <span class="user-meta-time">@lang('admin.not_online')</span>
                                    @endif --}}
                                </div>
                                @if($user->unread)
                                    <span class="preview" style="    position: absolute;
                                    top: 13px;
                                    right: 18px;
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 50%;
                                    background-color: orange;
                                    text-align: center;
                                    color: white;">{{ $user->unread }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="chat-box">
                <div class="chat-box-inner" id="content_message">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ajax')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var receiver_id = '';
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
            if (my_id == data.from) {
                var audio = new Audio('https://iquick.site/soundchat.mp3'); 
                audio.play();
                receiver_id = data.to;
                console.log("fff")
                $('.chat').append(`<div class="bubble me">
                    ${data.message}
                </div>`);
                $('.chat-conversation-box').scrollTop($('.chat-conversation-box')[0].scrollHeight);
                // $.ajax({
                //     type: "get",
                //     url: `{{url('dashborad/getMessage/${receiver_id}')}}`, // need to create this route
                //     data: "",
                //     cache: false,
                //     success: function (data) {
                //         $('#content_message').html(data);
                //         scrollToBottomFunc();
                //     }
                // });
            } else if (my_id == data.to) {
                var audio = new Audio('https://iquick.site/soundchat.mp3'); 
                audio.play();
                if (receiver_id == data.from) {
                    $('.chat').append(`<div class="bubble you">
                        ${data.message}
                    </div>`)
                    $('.chat-conversation-box').scrollTop($('.chat-conversation-box')[0].scrollHeight);
                    // if receiver is selected, reload the selected user ...
                    //receiver_id = data.from;
                    // $.ajax({
                    //     type: "get",
                    //     url: `{{url('dashborad/getMessage/${receiver_id}')}}`, // need to create this route
                    //     data: "",
                    //     cache: false,
                    //     success: function (data) {
                    //         $('#content_message').html(data);
                    //         scrollToBottomFunc();
                    //     }
                    // });
                } else {
                    var audio = new Audio('https://iquick.site/soundchat.mp3'); 
                    audio.play();
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.preview').html());

                    if (pending) {
                        $('#' + data.from).find('.preview').html(pending + 1);
                    } else {
                        $('#' + data.from).append(`<span class="preview" style="    position: absolute;
                                    top: 13px;
                                    right: 18px;
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 50%;
                                    background-color: orange;
                                    text-align: center;
                                    color: white;">1</span>`);
                    }
                }
            }
            setTimeout(function() { $( ".chat-form input" ).focus() }, 1000);
        });

        $('.person').on('click',function () {
            // $('.person').removeClass('active');
            // $(this).addClass('active');
            $(this).find('.preview').remove();
            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: `{{url('dashborad/getMessage/${receiver_id}')}}`, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#content_message').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keypress', '.chat-form input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: `{{url("dashborad/sendMessage")}}`, // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });
    $(document).on('click', '.switch input', function (e) {
            var chat_reply = $(this).val();
            // check if enter key is pressed and chat_reply is not null also receiver is selected
                $.ajax({
                    type: "post",
                    url: `{{url("dashborad/update/chat_reply")}}`, // need to create this post route
                    data: {chat_reply:chat_reply},
                    cache: false,
                    success: function (data) {
                        location.reload();
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
        });

    //make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
@endsection