<li class="menu">
    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-book">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span>@if(App\Models\Profile::where('id', session()->get('profile_id'))->first()!=null){{Str::limit(App\Models\Profile::where('id', session()->get('profile_id'))->first()->name, 15)}} @endif</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </a>
    <ul class="submenu list-unstyled collapse" id="users" data-parent="#accordionExample" style="">
        @foreach ($profile as $profil)
            <li >
                <a  href="{{ route('user.getprofileid', $profil->id) }}">
                    @if ($profil->id == session()->get('profile_id'))
                        <span class="" style="color: rgb(18, 172, 4)">{{ $profil->name }}</span>
                    @else
                    <span>{{ $profil->name }}</span>
                    @endif
                    
                </a>
            </li>
        @endforeach
        <li >
            <a href="{{ route('user.profiles.create') }}">
                    @lang('admin.add new')
            </a>
        </li>
    </ul>
</li>
