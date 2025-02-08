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
            <li><a href="/about">About</a></li>
            <li><a href="/layanan">Layanan</a></li>
            <li><a href="/galeri">Gallery</a></li>
            <li><a href="/kontak">Contact</a></li>

            <!-- Cek apakah pengguna sudah login -->
            @guest
                <li>
                    <a href="{{ route ('login') }}"
                        style="background-color: white; padding: 10px 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); color: black;">
                        Login/Register
                    </a>
                </li>
            @else
            @hasrole('users') 
                <li><a href="/rekomendasi">Rekomendasi</a></li>
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
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Temui kami di kontak tersebut</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-20">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>Jalan Serayu Tegal Rt 5 Rw 8 Kecamatan Mintaragen Kelurahan Tegal Timur</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>telu@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>0897468294759</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Mon-Sat: 8AM - 9PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>



        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
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