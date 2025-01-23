<?php
session_start();
require "functions.php";

$loggedIn = isset($_SESSION['role']);

if ($loggedIn) {

  $id_user = $_SESSION["id_user"];

  // Melakukan query hanya jika $_SESSION["id_user"] sudah terdefinisi
  $profil = query("SELECT * FROM user_212279 WHERE 212279_id_user = '$id_user'")[0];
}

$lapangan = query("SELECT * FROM lapangan_212279");

if (isset($_POST["simpan"])) {
  if (edit($_POST) > 0) {
    echo "<script>
          alert('Berhasil Diubah');
          </script>";
  } else {
    echo "<script>
          alert('Gagal Diubah');
          </script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Badminton Go!</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGOO.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/LOGOO.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Beranda<br></a></li>
          <li><a href="user/lapangan.php">Lapangan</a></li>
          <?php if ($loggedIn) : ?>
            <li class="nav-item">
              <a class="nav-link" href="user/pesanan.php">Pesanan</a>
            </li>
          <?php endif; ?>
          <li><a href="user/tournament.php">Tournament</a></li>
          <li><a href="user/promo.php">Promo</a></li>
          <li><a href="kontak.php">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if ($loggedIn) : ?>
        <!-- Jika sudah login, tampilkan tombol profil -->
        <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#profilModal">
          <i class="bi bi-person"></i> Profil
        </a>
      <?php else : ?>
        <!-- Jika belum login, tampilkan tombol login -->
        <a href="login.php" class="btn-getstarted" type="submit">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      <?php endif; ?>


    </div>
  </header>

 <!-- Modal Profil -->
<div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profilModalLabel">Profil Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <!-- Menampilkan Informasi Pengguna -->
              <h5 class="mb-3"><?= $profil["212279_nama_lengkap"]; ?></h5>
              <p><?= $profil["212279_jenis_kelamin"]; ?></p>
              <p><?= $profil["212279_email"]; ?></p>
              <p><?= $profil["212279_no_handphone"]; ?></p>
              <p><?= $profil["212279_alamat"]; ?></p>
              <a href="../logout.php" class="btn btn-danger">Logout</a>
              <a href="" data-bs-toggle="modal" data-bs-target="#editProfilModal" class="btn btn-inti">Lihat Profil</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Modal Profil -->

<!-- Lihat Profil -->
<div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfilModalLabel">Lihat Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center align-items-center">
          <div class="col">
            <div class="mb-3">
              <label for="exampleInputNama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="exampleInputNama" 
                value="<?= isset($profil["212279_nama_lengkap"]) ? htmlspecialchars($profil["212279_nama_lengkap"]) : ''; ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <input type="text" class="form-control" id="jenis_kelamin" 
                value="<?= isset($profil["212279_jenis_kelamin"]) ? htmlspecialchars($profil["212279_jenis_kelamin"]) : ''; ?>" readonly>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="212279_no_handphone" class="form-label">No Telp</label>
              <input type="text" class="form-control" id="212279_no_handphone" 
                value="<?= isset($profil["212279_no_handphone"]) ? htmlspecialchars($profil["212279_no_handphone"]) : ''; ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail" class="form-label">Email</label>
              <input type="text" class="form-control" id="exampleInputEmail" 
                value="<?= isset($profil["212279_email"]) ? htmlspecialchars($profil["212279_email"]) : ''; ?>" readonly>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="212279_alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="212279_alamat" 
            value="<?= isset($profil["212279_alamat"]) ? htmlspecialchars($profil["212279_alamat"]) : ''; ?>" readonly>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- End Edit Modal -->


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets\img\LATAR1.png" alt="" data-aos="fade-in">

<div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Nikmati Kemudahan Memesan<br>Lapangan Badminton <span class="text-"> Favorit Anda </span> <br> Dimana Saja Dan Kapan Saja!</h2>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="user/lapangan.php" class="btn-get-started">Booking Sekarang! <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2 my-auto" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/LATAR4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Badminton Go! Hadir Untuk Anda</h3>
            <p class="fst-italic">
              Temukan pengalaman bermain badminton yang luar biasa dengan lapangan favorit yang anda inginkan.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Lapangan badminton dengan fasilitas terbaik untuk permainan yang lebih seru dan efektif.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Akses mudah untuk memesan lapangan kapan saja, mendukung latihan dengan fleksibilitas penuh.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Suasana nyaman dan mendukung, membuat setiap sesi latihan semakin menyenangkan.</span></li>
            </ul>
            <a href="#" class="read-more "><span>Pelajari Lebih Lanjut</span><i class="bi bi-arrow-right"></i></a>
          </div>


        </div>

      </div>

    </section><!-- /About Section -->

   <!-- Counts Section -->
<section id="counts" class="section counts light-background">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4 justify-content-center">

    <div class="col-6 col-lg-3 col-md-6">
      <div class="shadow rounded stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
        <p>Pelanggan</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-6 col-lg-3 col-md-6">
      <div class="shadow rounded stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
        <p>Lapangan</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-6 col-lg-3 col-md-6">
      <div class="shadow rounded stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
        <p>Tournament</p>
      </div>
    </div><!-- End Stats Item -->

  </div>

</div>

</section><!-- /Counts Section -->


    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container d-flex justify-content-between align-items-center" data-aos="fade-up">
        <div class="left section-title">
          <h2>Pilihan Lapangan Favorit</h2>
          <p>Lapangan Terbaik</p>
        </div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <?php foreach ($lapangan as $row) : ?>

            <div class="col-6 col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-item">
                <img src="img/<?= $row["212279_foto"]; ?>" class="img-fluid" alt="...">
                <div class="course-content">
                  <p class="category">Lapangan</p>
                </div>
                <div class="p-3 text-content">
                  <h3><a href="course-details.html"><?= $row["212279_nama"]; ?></a></h3>
                  <p class="description"><?= $row["212279_keterangan"]; ?></p>
                </div>
              </div>
            </div>

          <?php endforeach; ?>

        </div>

      </div>

    </section><!-- /Courses Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-6 col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Basecamp</span>
          </a>
          <div class="footer-contact pt-3">
          <p>jln. Tanjung Pinang No 8</p>
          <p>Indonesia/Papua Barat Daya/Kota Sorong</p>
            <p class="mt-3"><strong>No Telp:</strong> <span>+62 822-3875-8919</span></p>
            <p><strong>Email:</strong> <span>badmintonGo@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class=" col-6 col-lg-4 col-md-6 footer-links">
          <h4>Navigasi</h4>
          <div class="row">
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Lapangan</a></li>
                <li><a href="#">Tournament</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Promo</a></li>
                <li><a href="#">Kontak</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-6 col-lg-4 col-md-6 footer-links">
          <h4>Syarat & Ketentuan</h4>
          <ul>
            <li><a href="#">Lihat Syarat & Ketentuan</a></li>
          </ul>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>