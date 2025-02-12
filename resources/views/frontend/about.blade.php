<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Apotek Telu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="tema/img/favicon1.png" rel="icon">
  <link href="tema/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="tema/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="tema/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="tema/vendor/aos/aos.css" rel="stylesheet">
  <link href="tema/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="tema/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="tema/css/main.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/telu" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="tema/img/logo.png" alt=""> -->
        <h1>Apotek Telu<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/product">Product</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/kontak">Contact</a></li>

          <!-- Cek apakah pengguna sudah login -->
          @guest
        <li>
        <a href="{{ route('login') }}"
          style="background-color: white; padding: 10px 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); color: black;">
          Login/Register
        </a>
        </li>
      @else
      @hasrole('users')
      <li><a href="/preferensi">Rekomendasi</a></li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle px-3 py-2" href="#" id="userDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false"
        style="background-color: white; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); color: black; display: inline-block;">
        {{ Auth::user()->name }}
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="dropdown-item">Logout</button>
        </form>
        </li>
      </ul>
      </li>
      @endhasrole('users')
    @endguest

        </ul>
      </nav>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Apotek Telu Tegal</h3>
            <img src="tema/img/about-3.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p>
              Program mitra jaringan Apotek Telu terbuka lebar untuk para pemilik apotek konvensional yang ingin
              mengembangkan bisnis
              Apoteknya menjadi lebih baik dengan standarisasi dari manajemen Apotek Telu.
            </p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Dalam perjalanannya, Apotek Telu selalu berusaha untuk mencetak prestasi dalam memberikan
                pelayanan terbaik bagi masyarakat indonesia
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Melayani Konsultasi</li>
                <li><i class="bi bi-check-circle-fill"></i> Menerima Pesanan </li>
                <li><i class="bi bi-check-circle-fill"></i> Menerima Resep Dokter</li>
              </ul>
              <p>
                Franchise Apotek Telu telah terbukti mempunyai sistem franchise unggul, yaitu brand kuat dan sudah
                dikenal, royalty fee ringan, dukungan terpadu (untuk pendirian gerai, rekrutmen & pelatihan staf,
                support IT online 24 jam, strategi pemasaran, hingga operasional), mendorong kewirausahaan, bisnis
                sekaligus ibadah. Serta
                menjadi berkat dan manfaat dengan memberikan akses obat yang mudah dan terjangkau bagi masyarakat
                Indonesia.
              </p>

              <div class="position-relative mt-4">
                <img src="tema/img/about-2.jpg" class="img-fluid rounded-4" alt="">

              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="tema/img/clients/1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="tema/img/clients/8.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <img src="tema/img/apoteker.png" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Pelayanan</strong> Banyak pelanggan yang berdatangan</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Obat</strong> Tersedia banyak obat</p>
            </div><!-- End Stats Item -->

          </div>

        </div>
    </section><!-- End Stats Counter Section -->

    <footer id="footer" class="footer">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Apotik Telu</span>
            </a>
            <p>Your Wellness Is Our Wellspring. Dimana Wellness anda adalah jantung kehidupan kami</p>



          </div>
        </div>

        <div class="container mt-4">
          <div class="copyright">
            &copy; Copyright <strong><span>Apotik Telu</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="tema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="tema/vendor/aos/aos.js"></script>
    <script src="tema/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="tema/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="tema/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="tema/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="tema/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="tema/js/main.js"></script>

</body>

</html>