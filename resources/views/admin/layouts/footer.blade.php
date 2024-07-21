@if (isset($_COOKIE['mode']) && $_COOKIE['mode'] != 'dark')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/light/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/light/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/light/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('admin/light/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL admin/light/PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/light/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/light/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL admin/light/PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/light/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/light/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/editors/markdown/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/select2/select2.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/light/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/fullcalendar/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('admin/light/plugins/fullcalendar/custom-fullcalendar.advance.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('admin/light/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/light/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('admin/light/assets/js/users/account-settings.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/light/assets/js/apps/mailbox-chat.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@else
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin/dark/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/dark/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/dark/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('admin/dark/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL admin/dark/PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('admin/dark/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/dark/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL admin/dark/PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/dark/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/dark/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/editors/markdown/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/select2/select2.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/dark/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/fullcalendar/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('admin/dark/plugins/fullcalendar/custom-fullcalendar.advance.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('admin/dark/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/dark/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('admin/dark/assets/js/users/account-settings.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin/dark/assets/js/apps/mailbox-chat.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endif
<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    var firstUpload = new FileUploadWithPreview('myFirstImage1')
    var firstUpload = new FileUploadWithPreview('myFirstImage2')
    var firstUpload = new FileUploadWithPreview('myFirstImage3')
</script>
<script>
    $(".tagging").select2({
        tags: true
    });
    var Selector = {
        mainHeader: '.header.navbar',
        headerhamburger: '.toggle-sidebar',
        fixed: '.fixed-top',
        mainContainer: '.main-container',
        sidebar: '#sidebar',
        sidebarContent: '#sidebar-content',
        sidebarStickyContent: '.sticky-sidebar-content',
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: '#content',
        contentWrapperContent: '.container',
        mainContentArea: '.main-content',
        searchFull: '.toggle-search',
        overlay: {
            sidebar: '.overlay',
            cs: '.cs-overlay',
            search: '.search-overlay'
        }
    };
    $('.sidebarCollapse').on('click', function(sidebar) {
        sidebar.preventDefault();
        getSidebar = $('.sidebar-wrapper');
        if ($('.collapse.submenu').hasClass('show')) {
            $('.submenu.show').addClass('mini-recent-submenu');
            getSidebar.find('.collapse.submenu').removeClass('show');
            getSidebar.find('.collapse.submenu').removeClass('show');
            $('.collapse.submenu').parents('li.menu').find('.dropdown-toggle').attr('aria-expanded',
                'false');
        } else {
            if ($(Selector.mainContainer).hasClass('sidebar-closed')) {
                if ($('.collapse.submenu').hasClass('recent-submenu')) {
                    getSidebar.find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                    $('.submenu').removeClass('mini-recent-submenu');

                } else {
                    $('li.active .submenu').addClass('recent-submenu');
                    getSidebar.find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                    $('.submenu').removeClass('mini-recent-submenu');
                }
            }
        }
        $(Selector.mainContainer).toggleClass("sidebar-closed");
        $(Selector.mainHeader).toggleClass('expand-header');
        $(Selector.mainContainer).toggleClass("sbar-open");
        $('.overlay').toggleClass('show');
        $('html,body').toggleClass('sidebar-noneoverflow');
    });
    $('.sidebar-wrapper').on('mouseenter mouseleave', function(event) {
        event.preventDefault();
        if ($('body').hasClass('alt-menu')) {
            if ($('.main-container').hasClass('sidebar-closed')) {
                if (event.type === 'mouseenter') {
                    $('li .submenu').removeClass('show');
                    $('li.active .submenu').addClass('recent-submenu');
                    $('li.active').find('.collapse.submenu.recent-submenu').addClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'true');
                } else if (event.type === 'mouseleave') {
                    $('li').find('.collapse.submenu').removeClass('show');
                    $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                        'aria-expanded', 'false');
                    $('.collapse.submenu').parents('.menu').find('.dropdown-toggle').attr('aria-expanded',
                        'false');
                }
            }
        } else {
            if ($('.main-container').hasClass('sidebar-closed')) {
                $('.collapse.submenu.recent-submenu').parents('.menu').find('.dropdown-toggle').attr(
                    'aria-expanded', 'true');
                $(this).find('.submenu.recent-submenu').toggleClass('show');
            }

        }
    });
    $('.sidebar-wrapper').off('mouseenter mouseleave');
    $('#dismiss, .overlay, cs-overlay').on('click', function() {
        // hide sidebar
        $(Selector.mainContainer).addClass('sidebar-closed');
        $(Selector.mainContainer).removeClass('sbar-open');
        // hide overlay
        $('.overlay').removeClass('show');
        $('html,body').removeClass('sidebar-noneoverflow');
    });
</script>

@include('sweetalert::alert')

@yield('ajax')

@livewireScripts

</body>

</html>
