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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

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
                <h1>Apotek Telu<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/product">Product</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/kontak">Contact</a></li>
                    @guest
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-outline-dark">Login/Register</a>
                    </li>
                    @else
                    @hasrole('users')
                    <li><a href="/preferensi">Rekomendasi</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-outline-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    @endhasrole
                    @endguest
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>Rekomendasi Produk</h1>
        <div class="row">
            @if($recommendedProducts->isNotEmpty())
                @foreach($recommendedProducts as $prodak)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/' . $prodak->logo) }}" class="card-img-top" alt="{{ $prodak->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $prodak->nama }}</h5>
                                <p class="card-text">{{ $prodak->deskripsi }}</p>
                                <p class="card-text"><strong>Kategori:</strong> {{ $prodak->kategori }}</p>
                                <p class="card-text"><strong>Gejala:</strong> {{ $prodak->gejala }}</p>
                                <p class="card-text"><strong>Usia:</strong> {{ $prodak->usia }}</p>
                                <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($prodak->harga, 0, ',', '.') }}</p>
                                <p class="card-text"><strong>Skor:</strong> {{ number_format($prodak->score, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">Tidak ada rekomendasi produk yang sesuai dengan preferensi Anda.</p>
                </div>
            @endif
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