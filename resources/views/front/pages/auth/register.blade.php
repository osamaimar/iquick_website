@extends('front.master')


@section('title', __('messages.Register'))

@section('title_breadcrumb', __('messages.Register'))

@section('css')

    <style>
        .popup-register {
            border-radius: 20px;
        }

        .popup-register .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.30);
            z-index: 1;
            display: none;
        }

        .popup-register .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(47deg, #060818 0%, #5C1AC3 100%);
            z-index: 2;
            border-radius: 15px;
            color: #FFF;
            width: 460px;
        }

        .popup-register .content .inside-content {
            width: 80%;
            margin-top: 20%;
        }

        .popup-register .content .inside-content .content-modal .firstname-input {
            width: 350px;
            height: 42px;
            border-radius: 10px;
            background: #C5CAE6;
            border: none;
            outline: none;
            text-indent: 20px;
        }

        .popup-register .content .inside-content .content-modal .firstname-input input {
            background: #C5CAE6;
        }

        .popup-register .content .inside-content .content-modal .firstname-input::placeholder {
            text-indent: 20px;
            color: #7074A9;
            text-align: right;
            font-size: 15px;
            font-family: Tajawal;
            font-style: normal;
            font-weight: 500;
            line-height: normal;

        }

        .popup-register .content .inside-content .content-modal .email-input {
            width: 350px;
            height: 42px;
            border-radius: 10px;
            background: #C5CAE6;
            border: none;
            outline: none;
            text-indent: 20px;
        }

        .popup-register .content .inside-content .content-modal .email-input input {
            background: #C5CAE6;
        }

        .popup-register .content .inside-content .content-modal .email-input::placeholder {
            text-indent: 20px;
            color: #7074A9;
            text-align: right;
            font-size: 15px;
            font-family: Tajawal;
            font-style: normal;
            font-weight: 500;
            line-height: normal;

        }

        .popup-register .content .inside-content .content-modal .password-input {
            width: 350px;
            height: 40px;
            margin-top: 15px;
            border-radius: 10px;
            background: #C5CAE6;
            border: none;
            outline: none;
            text-indent: 20px;
        }

        .popup-register .content .inside-content .content-modal .password-input input {
            background: #C5CAE6;
            border: none;
            outline: none;
            text-indent: 20px;
            font: 600;
        }

        .popup-register .content .inside-content .content-modal .password-input::placeholder {
            text-indent: 20px;
            color: #7074A9;
            text-align: right;
            font-size: 15px;
            font-family: Tajawal;
            font-style: normal;
            font-weight: 500;
            line-height: normal;

        }

        .popup-register .close-btn {
            position: absolute;
            right: 20px;
            top: 10px;
            width: 25px;
            height: 25px;
            background: #C5CAE6;
            color: #41148E;
            font-size: 20px;
            text-align: center;
            border-radius: 50%;
            cursor: pointer;
        }

        .position-relative {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 64%;
            left: -80%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7074A9
        }

        .submit-btn {
            width: 350px;
            height: 42px;
            border-radius: 10px;
            background: #150B36;
            color: #FEFEFF;
            border: none;
        }

        .create-account {
            margin-top: 30px;
            margin-bottom: 40px;
            width: 350px;
            display: flex;
            justify-content: center;
            align-items: unset;
        }

        .create-account p {
            color: #7074A9;
            text-align: right;
            font-size: 16px;
            font-family: Tajawal;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            margin-left: 5px;
        }

        .create-account a {
            color: #FFF;
            font-size: 16px;
            font-family: Tajawal;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
        }

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

        function togglePasswordVisibilityconfirm() {
            var x = document.getElementById("password-confirm");
            var y = document.getElementById("togglePassword-confirm");
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

        togglePassword-confirm
    </script>
@endsection
