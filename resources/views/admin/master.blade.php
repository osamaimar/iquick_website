@include('admin.layouts.header')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    @include('admin.layouts.sidebar')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h3>@yield('page-title')</h3>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

@include('admin.layouts.footer')
