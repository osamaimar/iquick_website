@foreach ($notices as $notice)
<a href="{{ route('admin.orders.show', $notice->order_id) }}" class="d-block mb-2">
    <div class="dropdown-item">
        <div class="media">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-message-square">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <div class="media-body">
                <div class="notification-para"><span class="user-name">{{$notice->user_name}}</span> @if($notice->filed_name!=null) {{$notice->attchname}}  @else {{$notice->order_code}} @endif</div>
                <div class="notification-meta-time">{{$notice->messages}}</div>
                <div class="notification-meta-time">@if($notice->order_status=="canceled"||$notice->order_status=="pending"||$notice->order_status=="done"||$notice->order_status=="successful")@lang("admin.status") @lang("admin.$notice->order_status")@elseif($notice->filed_name!=null) {{$notice->filed_name}}  @else {{ $notice->order_status}} @endif</div>
            </div>
        </div>
    </div>
</a>
@endforeach
{{-- @foreach ($notices as $notice)
<a href="{{ route('admin.orders.index') }}" class="d-block mb-2">
    <div class="dropdown-item">
        <div class="media">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-message-square">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <div class="media-body">
                <div class="notification-para"><span class="user-name">{{$notice->user_name}}</span> @if($notice->filed_name!=null) {{$notice->attchname}}  @else {{$notice->order_code}} @endif</div>
                <div class="notification-meta-time">{{$notice->messages}}</div>
                <div class="notification-meta-time">@if($notice->order_status=="canceled"||$notice->order_status=="pending"||$notice->order_status=="done")تم تغير @lang("admin.status") الى @lang("admin.$notice->order_status")@elseif($notice->order_status=="successful") @lang("admin.status") @lang("admin.$notice->order_status")@elseif($notice->filed_name!=null) {{$notice->filed_name}}  @else @lang("admin.order_stocks") / {{ $notice->order_status}} @endif</div>
            </div>
        </div>
    </div>
</a>
@endforeach --}}