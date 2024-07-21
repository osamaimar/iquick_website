<div class="chat-meta-user chat-active">
    <div class="current-chat-user-name"><span><img src="@if ($image_user!=null)
        {{asset('storage/images/userprofile/'.$image_user)}}
    @else
    {{asset("assets/images/images.jpg")}}
    @endif" alt="dynamic-image"><span class="name"></span>{{$username}}</span></div>
    @can('chat-chatReply')
    <div class="chat-action-btn align-self-center">
        <label class="switch s-icons s-outline s-outline-primary mr-2">
            <input type="checkbox" name="chat_reply" @if(Auth::user()->chat_reply=='1') checked  value="0" @else value="1" @endif>
            <span class="slider round"></span>
        </label>
    </div>
    @endcan
</div>
<div class="chat-conversation-box ps--active-y" style="    display: flex;
flex-direction: column-reverse;">
    <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll message-wrapper">
        <div class="chat active-chat" data-chat="person{{$to}}">
            @foreach ($messages as $message)
            <div class="conversation-start">
                <span>{{ $message->created_at->diffForHumans() }}</span>
            </div>
            <div class="bubble {{ ($message->from == Auth::id()) ? 'me' : 'you' }}">
                {{ $message->message }}
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="chat-footer chat-active">
    <div class="chat-input">
        <form class="chat-form" action="javascript:void(0);">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            <input type="text" name="message" class="mail-write-box form-control" placeholder="Message"/>
        </form>
    </div>
</div>
