@if (!empty($setting))
<footer class="end-page">
  <div class="container">
    <div class="end-page_image me-4">
      <img src="{{ asset('assets/images/icon-main.svg') }}" alt="logo">
    </div>
    <div class="mt-4">
      <div class="row">
        <div class="col-lg-5">
          <p class="text-sm-centermb-3 text-start"><?php echo $setting->about_us; ?></p>
        </div>
        <div class="col-lg-4">
          <x-nav-footer/>
        </div>
        <div class="col-lg-3">
          <div class="social mb-3">
            <a href="{{$setting->facebook}}" class="social-item">
              <i class="fab fa-facebook-f fa-xl"></i>
            </a>
            <a href="{{$setting->Linkedin}}" class="social-item">
              <i class="fa-brands fa-linkedin-in fa-xl"></i>
            </a>
            <a href="{{$setting->twitter}}" class="social-item">
              <i class="fa-brands fa-twitter fa-xl"></i>
            </a>
            <a href="{{$setting->insta}}" class="social-item">
              <i class="fa-brands fa-instagram fa-xl"></i>
            </a>

          </div>
          <div class="email-icon d-flex justify-content-center mt-2 social ">
            <div class="mt-3">
                <p>info@iquick.site</p>
            </div>
            <div class="social-item">
                <i class="fa-regular fa-envelope fa-xl"></i>
            </div>
        </div>
        </div>
      </div>
      <div class="copyright">
        <p class="text-center mt-4">
            جميع الحقوق محفوظة ل أي كويك @2023
        </p>
    </div>
    </div>
  </div>
</footer>
<!-- End Footer -->
@endif
