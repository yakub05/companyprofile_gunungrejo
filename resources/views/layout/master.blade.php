<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kedok Ombo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/User/img/favicon.png" rel="icon">
  <link href="assets/User/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/User/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/User/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/User/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/User/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/User/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/User/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/User/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Serenity - v4.11.0
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{ URL::route('index') }}">SIKOMBO</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="{{ URL::route('index') }}">Home</a></li>
          <li><a href="{{ URL::route('about') }}">About</a></li>
          <li><a href="{{ URL::route('blog')}}">Blog</a></li>
          <li><a href="{{ URL::route('Portfolio') }}">Portofolio</a></li>
{{--
          <li><a class="getstarted" href="about.html">Get Started</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  @yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>SIKOMBO</h3>
            <p>SIKOMBO (Sistem Informasi Kedok Ombo) merupakan website yang memuat berbagai informasi seputar wisata kedok ombo yang terletak di desa Gunungrejo kecamatan Singasari</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link Halaman</h4>
            <ul>
              <li><a href="{{ URL::route('index') }}">Home</a></li>
              <li><a href="{{ URL::route('about') }}">About</a></li>
              <li><a href="{{ URL::route('blog')}}">Blog</a></li>
              <li><a href="{{ URL::route('Portfolio') }}">Portofoloio</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi Kami</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <strong>Copyright &copy; 2023 <a>Pemerintah Desa Gunungrejo - Kecamatan Singosari</a>.</strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
        Supported by : <br><br>
        <a href="https://ub.ac.id/id/"><img src="assets/User/img/logo/logo_ub.png" style="width:50px;height:50px;"></a>
        <a href="https://vokasi.ub.ac.id/"><img src="assets/User/img/logo/Logo_VokasiUB.png" style="width:70px;height:50px;"></a>
        <a href="https://www.instagram.com/kkn02_gunungrejo/"><img src="assets/User/img/logo/Logo_kkn.png" style="width:50px;height:50px;"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/User/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/User/vendor/aos/aos.js"></script>
  <script src="assets/User/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/User/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/User/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/User/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/User/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/User/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/User/js/main.js"></script>

</body>

</html>
