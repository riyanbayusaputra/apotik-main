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

    <style>
        .obat-item {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            background-color: #fff;
            transition: box-shadow 0.3s ease;
        }

        .obat-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .obat-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .obat-item h4 {
            font-size: 1.1rem;
            margin-top: 10px;
            text-align: center;
        }

        .obat-item p {
            font-size: 0.9rem;
            text-align: center;
        }

        .obat-item .price {
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            color: #007bff;
        }

        .row .col-lg-3,
        .row .col-md-6 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/telu" class="logo d-flex align-items-center">
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
        </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="obat" class="obat">
            <div class="container" data-aos="fade-up">
                <div class="section-header text-center">
                    <h2>Obat-Obatan</h2>
                    <p>Temukan berbagai obat yang tersedia di Apotek Telu</p>
                </div>

                <!-- Grid dengan 4 kolom per baris -->
                <div class="row gx-lg-0 gy-4">
                    <!-- Obat 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="obat-item card shadow-sm">
                            <img src="tema/img/obherbal.jpg" alt="Obat 1" class="img-fluid card-img-top">
                            <div class="card-body text-center">
                                <h4 class="card-title">OB HERBAL 60ML</h4>
                                <p class="card-text"><strong>Harga:</strong> Rp16.600,00</p>
                                <a href="{{ route('show', 1) }}" class="btn btn-primary">Lihat Detail</a>

                            </div>
                        </div>
                    </div>

                    <!-- Obat 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="obat-item card shadow-sm">
                            <img src="tema/img/tempra30.jpg" alt="Obat 2" class="img-fluid card-img-top">
                            <div class="card-body text-center">
                                <h4 class="card-title">TEMPRA SYRUP 30ML</h4>
                                <p class="card-text"><strong>Harga:</strong> Rp27.500,00</p>
                                <a href="{{ route('show', 2) }}" class="btn btn-primary">Lihat Detail</a>

                            </div>
                        </div>
                    </div>

                    <!-- Obat 3 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="obat-item card shadow-sm">
                            <img src="tema/img/tempra60.jpg" alt="Obat 3" class="img-fluid card-img-top">
                            <div class="card-body text-center">
                                <h4 class="card-title">TEMPRA SYRUP 60ML</h4>
                                <p class="card-text"><strong>Harga:</strong> Rp45.700</p>
                                <a href="{{ route('show', 3) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Obat 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="obat-item card shadow-sm">
                            <img src="tema/img/tempraforte2.jpg" alt="Obat 4" class="img-fluid card-img-top">
                            <div class="card-body text-center">
                                <h4 class="card-title">TEMPRA FORTE JERUK 60ML</h4>
                                <p class="card-text"><strong>Harga:</strong> Rp52.700</p>
                                <a href="{{ route('show', 4) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>


                    <div class="pagination-wrapper text-center mt-4">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


        </section><!-- End Obat-Obatan Section -->
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

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