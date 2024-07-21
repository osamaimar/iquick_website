<li class="menu {{ request()->is('dashborad/events') ? 'active' : '' }}">
    <a href="{{ route('admin.events.index') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                </path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span>@lang('admin.events')</span>
            <span class="count-response"><strong class="response-count">{{$today_events}}</strong></span>
            <span class="count-response" style="margin-right:3px !important;background:#e36e14;"><strong class="response-count">{{$tomorrow_events}}</strong></span>
        </div>
    </a>
</li>