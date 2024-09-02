<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SI-FARA</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <!-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <h5 class="sitename"> Bagian Umum <br> Sekretaris Daerah <br> Kota Mataram </h5>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#peminjaman">Daftar Peminjaman Fasilitas</a></li>
          <li><a href="#about">Tentang Kami</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div class="container">
        <div class="row gy-4">
          <div class="text-center col-lg-20 d-flex flex-column justify-content-center align-items-center text-md-start" data-aos="fade-up">
            <h2>WELCOME TO SI-FARA</h2>
            <p>SISTEM INFORMASI FASILITAS ACARA DAN RAPAT</p>
            <div class="mt-4 d-flex justify-content-center justify-content-md-start">
              <a href="{{ route('login') }}" class="download-btn"><i class="bi bi-arrow-right-circle"></i> <span>Log In</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

    <!-- Peminjaman Section -->
    <section id="peminjaman" class="peminjaman section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Peminjaman Fasilitas</h2>
        <h4 id="booking-date"></h4>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
            <div class="peminjaman-container">
              <div class="peminjaman-item peminjaman-active">
                <h3>Ruangan</h3>
                <div class="peminjaman-content">
                  <h5>PKK 10.00-15.00 WITA Ruangan Kenari</h5>
                </div>
                <i class="peminjaman-toggle bi bi-chevron-right"></i>
              </div>
              <div class="peminjaman-item">
                <h3>Alat</h3>
                <div class="peminjaman-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices...</p>
                </div>
                <i class="peminjaman-toggle bi bi-chevron-right"></i>
              </div>
              <div class="peminjaman-item">
                <h3>Kendaraan</h3>
                <div class="peminjaman-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim...</p>
                </div>
                <i class="peminjaman-toggle bi bi-chevron-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Peminjaman Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
      </div>
      <div class="container">
        <div class="row gy-4 align-items-center about-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('assets/img/favicon.png') }}" class="img-fluid w-50" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>SI-FARA (Sistem Informasi Fasilitas Acara dan Rapat)</h3>
            <p class="fst-italic">
              Bagian Umum Sekretariat Daerah Kota Mataram bertanggung jawab mengelola tata usaha pimpinan, kepegawaian, keuangan, serta perlengkapan. Untuk meningkatkan efisiensi dan kualitas layanan, kami menghadirkan Sistem Informasi Fasilitasi Acara dan Rapat (SI-FARA).
            </p>
            <ul>
              <li><i class="bi bi-check"></i> <span>Efisiensi Pengelolaan Sumber Daya</span></li>
                  <h3 style="font-size: 14px; color: #666; margin-left: 20px;"> Digitalisasi manajemen fasilitas untuk mengurangi proses manual dan meningkatkan optimalisasi penggunaan.</h3>
                  <li><i class="bi bi-check"></i> <span>Peningkatan Transparansi dan Akuntabilitas</span></li>
                  <h3 style="font-size: 14px; color: #666; margin-left: 20px;"> Memperbaiki pelaporan dan pemantauan real-time atas sumber daya fisik.</h3>
                  <li><i class="bi bi-check"></i> <span>Pengembangan Berkelanjutan</span></li>
                  <h3 style="font-size: 14px; color: #666; margin-left: 20px;"> Mendorong inovasi teknologi dan peningkatan kompetensi staf sesuai kebijakan nasional.</h3>
              </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->
  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">SI-FARA</h3>
      <p>Jl. Pejanggik No.16, Mataram Bar., Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83126</p>
      <p>Kompleks Walikota Gedung Utara Lantai 1</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-youtube"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">SI-FARA</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- JavaScript untuk menampilkan tanggal hari ini -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var today = new Date();
      var formattedDate = today.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
      document.getElementById('booking-date').textContent = 'Tanggal Booking: ' + formattedDate;
    });
  </script>
</body>
</html>