@extends('user.master')


@section('title', __('admin.edit'))

@section('page-title', __('admin.edit'))

@section('content')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3mfb45n';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <div class="row">
        <div class="col-10 mx-auto">
            @include('general-components.admin.message')
            <form action="{{ route('user.change/password',Auth::user()->id) }}" method="post" class="border p-4">
                @csrf
                @method('put')
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="old_password"  class="form-control"
                            placeholder="{{ __('messages.Old_Password') }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <input type="text" name="new_password" class="form-control"
                            placeholder="{{ __('messages.New_Password') }}">
                    </div>
                    <div class="col-12  mb-4">
                        <input type="text" name="password_confirmation" class="form-control"
                            placeholder="{{ __('messages.confirm_password') }}">
                    </div>
                </div>
                <input type="submit" name="submit" value="{{ __('messages.Change') }}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
