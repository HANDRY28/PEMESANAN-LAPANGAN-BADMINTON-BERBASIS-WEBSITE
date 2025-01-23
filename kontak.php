<?php
session_start();
require "functions.php";

$loggedIn = isset($_SESSION['role']);

if ($loggedIn) {

  $id_user = $_SESSION["id_user"];

  // Melakukan query hanya jika $_SESSION["id_user"] sudah terdefinisi
  $profil = query("SELECT * FROM user_212279 WHERE 212279_id_user = '$id_user'")[0];
}

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
    <title>badmintonGo!</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


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
                    <li><a href="index.php">Beranda<br></a></li>
                    <li><a href="user/lapangan.php">Lapangan</a></li>
                    <?php if ($loggedIn): ?>
            <li class="nav-item">
              <a class="nav-link" href="user/pesanan.php">Pesanan</a>
            </li>
        <?php endif; ?>
                    <li><a href="user/tournament.php">Tournament</a></li>
                    <li><a href="user/promo.php">Promo</a></li>
                    <li><a href="kontak.php" class="active">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <?php if ($loggedIn): ?>
            <!-- Jika sudah login, tampilkan tombol profil -->
            <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#profilModal">
                <i class="bi bi-person"></i> Profil
            </a>
        <?php else: ?>
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
   <section id="contact" class="contact section">

<div class="mb-5" data-aos="fade-up" data-aos-delay="200">
  <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3989.357516786993!2d131.24738420321557!3d-0.870809505731631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1735740119630!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div><!-- End Google Maps -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-4">
      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
        <i class="bi bi-geo-alt flex-shrink-0"></i>
        <div>
          <h3>Alamat</h3>
          <p>jln. Tanjung Pinang No 8</p>
        </div>
      </div><!-- End Info Item -->

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
        <i class="bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Hubungi</h3>
          <p>+62 822-3875-8919</p>
        </div>
      </div><!-- End Info Item -->

      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
        <i class="bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email</h3>
          <p>badmintonGo.@gmail.com</p>
        </div>
      </div><!-- End Info Item -->

    </div>

    <div class="col-lg-8">
      <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">

          <div class="col-md-12">
            <input type="text" name="name" class="form-control rounded" placeholder="Nama Lengkap" required="">
  </div>

          <div class="col-md-12">
            <textarea class="form-control rounded" name="message" rows="6" placeholder="Pesan" required=""></textarea>
          </div>

          <div class="col-md-12 text-center">

            <button type="submit">Kirim via whatsapp</button>
          </div>

        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->
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
                        <p><strong>Email:</strong> <span>badmintonGo.@gmail.com</span></p>
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