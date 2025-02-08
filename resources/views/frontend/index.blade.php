<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Apotek Telu</title>
    <meta content="" name="description">
    <meta content="" name="keywords"> <!-- Favicons -->
    <link href="tema/img/favicon1.png" rel="icon">
    <link href="tema/img/apple-touch-icon.png" rel="apple-touch-icon"> <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"> <!-- Vendor CSS Files -->
    <link href="tema/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="tema/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="tema/vendor/aos/aos.css" rel="stylesheet">
    <link href="tema/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="tema/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> <!-- Template Main CSS File -->
    <link href="tema/css/main.css" rel="stylesheet">
</head>

<body> <!-- Header -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between"> <a href="/telu"
                class="logo d-flex align-items-center">
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
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i> <i
                class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header> <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to <span>Apotek Telu</span></h2>
                    <p>Your Wellness Is Our Wellspring. Dimana Wellness anda adalah jantung kehidupan kami</p>
                    <div class="d-flex justify-content-center justify-content-lg-start"> <a href="#about"
                            class="btn-get-started">Get Started</a> </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2"> <img src="tema/img/farma.png" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100"> </div>
            </div>
        </div>
    </section>
    <section id="additional-text" class="additional-text py-5" style="background-color: #f8f9fa;">
        <div class="container text-center" data-aos="fade-up">
            <h2 class="fw-bold text-dark mb-4">Solusi Kesehatan Terlengkap untuk Anda</h2>
            <p class="lead text-muted px-3">
                Apotek Telu hadir untuk memberikan layanan kesehatan yang lengkap dan terpercaya bagi Anda dan keluarga.
                Kami menyediakan berbagai jenis obat-obatan, suplemen kesehatan, serta produk perawatan tubuh yang
                berkualitas.
                Dengan tenaga farmasi profesional, kami siap memberikan konsultasi kesehatan dan membantu Anda menemukan
                solusi terbaik sesuai dengan kebutuhan.
            </p>

            <div class="row mt-4">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card border-0 shadow-lg p-4">
                        <i class="bi bi-capsule text-primary display-4 mb-3"></i>
                        <h5 class="fw-semibold">Obat Berkualitas</h5>
                        <p class="text-muted">Kami menyediakan obat dengan kualitas terbaik dan harga bersaing.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card border-0 shadow-lg p-4">
                        <i class="bi bi-star text-warning display-4 mb-3"></i>
                        <h5 class="fw-semibold">Pelayanan Terbaik</h5>
                        <p class="text-muted">Kami berkomitmen memberikan pelayanan yang ramah, cepat, dan profesional
                            demi kepuasan pelanggan.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card border-0 shadow-lg p-4">
                        <i class="bi bi-heart-pulse text-danger display-4 mb-3"></i>
                        <h5 class="fw-semibold">Konsultasi Kesehatan</h5>
                        <p class="text-muted">Konsultasikan kesehatan Anda dengan tenaga farmasi profesional kami.</p>
                    </div>
                </div>
            </div>

            <a href="/layanan" class="btn btn-primary mt-4 px-4 py-2" data-aos="fade-up" data-aos-delay="400">
                Lihat Layanan Kami
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info"> <a href="/telu" class="logo d-flex align-items-center">
                        <span>Apotek Telu</span> </a>
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
    </footer> <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div> <!-- Vendor JS Files -->
    <script src="tema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="tema/vendor/aos/aos.js"></script>
    <script src="tema/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="tema/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="tema/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="tema/vendor/isotope-layout/isotope.pkgd.min.js"></script> <!-- Template Main JS File -->
    <script src="tema/js/main.js"></script>
    <script>
        // Initialize AOS for animations
        AOS.init();
    </script>
</body>

</html>