<li class="menu {{ request()->is('dashborad/orders') ? 'active' : '' }}">
    <a href="{{ route('admin.orders.index') }}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-dollar-sign">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
            <span>@lang('admin.orders')</span>
            <span class="count-response"><strong class="response-count">{{$orders}}</strong></span>
        </div>
    </a>
</li>