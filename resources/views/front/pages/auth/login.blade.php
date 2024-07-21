@extends('front.master')

@section('title', __('messages.Login'))

@section('title_breadcrumb', __('messages.Login'))

@section('css')

    <style>

    </style>

@endsection

@section('content')



@endsection

@section('ajax_front')
    <script>
        function togglePasswordVisibility() {
            var x = document.getElementById("password");
            var y = document.getElementById("togglePassword");
            if (x.type === "password") {
                x.type = "text";
                y.classList.remove('far', 'fa-eye');
                y.classList.add('far', 'fa-eye-slash');
            } else {
                x.type = "password";
                y.classList.remove('far', 'fa-eye-slash');
                y.classList.add('far', 'fa-eye');
            }
        }
    </script>
@endsection
