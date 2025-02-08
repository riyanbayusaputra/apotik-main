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
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Gallery</h2>
          <p>Berikut ini beberapa gallery yang terdapat pada Apotik Telu</p>
        </div>
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
          data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4 portfolio-container">

            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/image.jpg')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/image.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Pemeriksaan Berbagai Macam</a></h4>
                  <p>Disini dapat dilakukan pemeriksaan gula darah, kolesterol, asam urat, dll</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-product">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/obat.jpg')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/obat.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Pelayanan Pembelian Obat</a></h4>
                  <p>Pembelian Berbagai Macam Obat dapat dilakukan disini</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/dokter.jpg')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/dokter.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Penerimaan Resep Dokter</a></h4>
                  <p>Dapat melakukan pelayanan penerimaan resep dokter</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-books">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/karyawan.jpg')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/karyawan.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Karyawan</a></h4>
                  <p>Semua karyawan disini adalah karyawan yang mengetahui tentang obat</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/periksa.jpg')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/periksa.jpg" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Melakukan Pengecekan Obat</a></h4>
                  <p>Karyawan selalu melakukan pengecekan kesediaan obat yang ada di apotik ini</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-xl-4 col-md-6 portfolio-item filter-product">
              <div class="portfolio-wrap">
                <a href="{{asset('tema/img/portfolio/apotik.png')}}" data-gallery="portfolio-gallery-app"
                  class="glightbox"><img src="tema/img/portfolio/apotik.png" class="img-fluid" alt=""></a>
                <div class="portfolio-info">
                  <h4><a href="portfolio-details.html" title="More Details">Apoteker</a></h4>
                  <p>Disini terdapat apoteker yang dapat dipercaya</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->




            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <img src="{{asset('tema/img/team/team-2.jpg')}}" class="img-fluid" alt="">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div><!-- End Team Member -->


          </div>

        </div>
    </section><!-- End Our Team Section -->

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