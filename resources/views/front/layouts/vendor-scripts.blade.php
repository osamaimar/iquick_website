<script src="{{ URL::asset('assets/js/plugins.js') }}"></script>
<script src="{{ URL::asset('assets/js/theme.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6495e88b94cf5d49dc5f7d5e/1h3kp8oem';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        
        Tawk_API.onLoad = function(){
        $("#forgot-password-btn").click(function() {
                Tawk_API.toggle();
        });
};
</script>
<!--End of Tawk.to Script-->

@yield('script')
@yield('script-bottom')
