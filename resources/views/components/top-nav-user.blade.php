<li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if(App\Models\Profile::where('id',
            session()->get('profile_id'))->first()!=null)
            <?php $profile_select=App\Models\Profile::where('id', session()->get('profile_id'))->first(); ?>
        <img style="    width: 30px;
        height: 30px;
        border-radius: 50%;" src="<?php if($profile_select->file!=null): echo asset('storage/images/profiles/'.$profile_select->file); else: echo asset('assets\images\man.png'); endif; ?>" class="img-fluid"
                        alt="avatar">
        @endif
    </a>
    <div class="dropdown-menu position-absolute e-animated e-fadeInUp"
        aria-labelledby="userProfileDropdown">
        @if(App\Models\Profile::where('id',
            session()->get('profile_id'))->first()!=null)
            <?php $profile_select=App\Models\Profile::where('id', session()->get('profile_id'))->first(); ?>
            <div class="user-profile-section">
                <div class="media mx-auto">
                    <img src="<?php if($profile_select->file!=null): echo asset('storage/images/profiles/'.$profile_select->file); else: echo asset('assets\images\man.png'); endif; ?>" class="img-fluid mr-2"
                        alt="avatar">
                    <div class="media-body">
                        <h5 class="mb-2">{{ Str::limit($profile_select->name, 15) }}</h5>
                        <p>{{ $profile_select->code }}</p>
                    </div>
                </div>
            </div>            
            @endif
        
        @foreach ($profile as $profil)
        <div class="dropdown-item">
            <a href="{{ route('user.getprofileid', $profil->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                    <path
                        d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                    </path>
                </svg> <span>{{ $profil->name }}</span>
            </a>
        </div>
        @endforeach
        <div class="dropdown-item">
            <a href="{{ route('user.profiles.create') }}" class="btn btn-primary">
                <div class="">
                    @lang('admin.add new')
                </div>
            </a>
        </div>
    </div>
</li>