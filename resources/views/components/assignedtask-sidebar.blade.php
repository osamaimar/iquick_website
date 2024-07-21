<li class="menu {{ request()->is('dashborad/assignedtasks') ? 'active' : '' }}">
    <a href="{{ route('admin.assignedtasks.index') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-target">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="6"></circle>
                <circle cx="12" cy="12" r="2"></circle>
            </svg>
            <span>@lang('admin.assignedtasks')</span>
            <span class="count-response"><strong class="response-count">{{$pending_tasks}}</strong></span>
            <span class="count-response" style="margin-right:3px !important;background:#e36e14;"><strong class="response-count">{{$done_tasks}}</strong></span>
        </div>
    </a>
</li>