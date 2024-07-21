{{-- <div class="chatbox__header">
    <div class="chatbox__content--header">
        <h4 class="chatbox__heading--header">@lang("admin.chat")</h4>
    </div>
</div>
<div class="chatbox__messages">
    <div>
        @if (isset($message))
        <div class="messages__item messages__item--operator">
            {{$message}}
        </div>
        @else
        @foreach ($messages as $message)
            <div class="messages__item {{ ($message->from == Auth::id()) ? 'messages__item--operator' : 'messages__item--visitor' }}">
                {{$message->message}}
            </div>
        @endforeach
        @endif
    </div>
</div>
<div class="chatbox__footer">
    <input type="text" name="message" placeholder="{{__("admin.Write_message")}}">
</div> --}}
<div class="card-head">تواصل مباشرة معنا</div>
<div class="chat-body d-flex flex-column-reverse" id="chat_body">
    <div class="d-flex flex-column">
        @if (isset($message))
        <div class="left">
            <div class="chat-track">
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <img src="{{asset('assets/images/chat/support.svg')}}" alt="support">
                    <h5 class="user-name">فريق الدعم</h5>
                </div>
                <p class="massage">{{$message}}</p>
            </div>
        </div>
        @else
            @foreach ($messages as $message)
                <div class="{{ ($message->from == Auth::id()) ? 'right' : 'left' }}">
                    <div class="chat-track">
                        @if ($message->from == Auth::id())
                        <h5 class="user-name" style="color: #3b3f5c;">أنت</h5>
                        @else
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <img src="{{asset('assets/images/chat/support.svg')}}" alt="support">
                            <h5 class="user-name" style="color: #3b3f5c;">فريق الدعم</h5>
                        </div>
                        @endif
                        <p class="massage">{{$message->message}}</p>
                        <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="append">
        
        </div>
    </div>
</div>
<div class="chat-footer">
    <div class="message">
        <input type="text" class="message-input" id="message-input" placeholder="اكتب استفسارك" name="chat">
    </div>
</div>