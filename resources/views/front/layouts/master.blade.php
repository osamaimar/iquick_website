<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - اكويك</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/9222c1a550.js" crossorigin="anonymous"></script>
    
    @include('front.layouts.head-css')
</head>

<body dir="rtl">
    <div class="content">
        <!-- Begin page -->
        <div class="content-wrapper">
            @include('front.layouts.header')

            @yield('content')
        </div>
        <!-- END layout-wrapper -->
        @include('front.layouts.footer')
    </div>

    <!-- JAVASCRIPT -->
    @include('front.layouts.vendor-scripts')
</body>

</html>
