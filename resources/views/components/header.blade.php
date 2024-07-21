@if (!empty($setting))
<a class="navbar-brand" href="{{route("home")}}"><img src="<?php if($setting->header_logo!=null): echo asset('storage/images/settings/header_logo/'.$setting->header_logo);  else: echo asset('./assets/images/logo.png'); endif; ?>" alt="logo"></a>
@endif