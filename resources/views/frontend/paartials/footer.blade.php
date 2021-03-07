<footer id="footer">
    <div class="container">
      <img width="100px" src="{{ asset('assets/img/logo.png') }}" alt="IPS">
      <h3>Institute of Professional Studies</h3>
      <p>{{ $settings['footer_description'] ?? '' }}</p>
      <div class="social-links">
        <a href="{{ $settings['footer_twitter'] ?? '' }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $settings['footer_facebook'] ?? '' }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $settings['footer_instagram'] ?? '' }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ $settings['footer_googleplus'] ?? '' }}" class="google-plus"><i class="bx bxl-google-plus"></i></a>
        <a href="{{ $settings['footer_skype'] ?? '' }}" class="skype"><i class="bx bxl-skype"></i></a>
        <a href="{{ $settings['footer_linkedin'] ?? '' }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>IPS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Developed by <a href="https://pearlencoder.com/">PearlEncoder</a>
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  