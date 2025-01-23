<?php
require "../functions.php";

if (isset($_POST["daftar"])) {
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

  if ($password === $confirm_password) {
    if (daftar($_POST) > 0) {
      echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= ../login.php'/>  ";
    }
  } else {
    echo "<div class='alert alert-danger'>Password dan Konfirmasi Password tidak sama.</div>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    // Fungsi untuk validasi panjang No Hp
    function validatePhoneNumber(input) {
      const maxLength = 12;
      const errorMessage = document.getElementById('phone_error');
      if (input.value.length > maxLength) {
        errorMessage.textContent = "Nomor telepon maksimal 12 digit.";
        input.value = input.value.slice(0, maxLength);
      } else {
        errorMessage.textContent = "";
      }
    }

    // Fungsi untuk toggle visibility password
    function togglePassword(id, iconId) {
      const passwordField = document.getElementById(id);
      const icon = document.getElementById(iconId);
      if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.setAttribute('data-feather', 'eye');
      } else {
        passwordField.type = "password";
        icon.setAttribute('data-feather', 'eye-off');
      }
      feather.replace(); // Refresh icons
    }

    // Validasi sebelum submit
    function validatePasswords() {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm_password').value;

      if (password !== confirmPassword) {
        alert('Password dan Konfirmasi Password tidak sama.');
        return false;
      }
      return true;
    }
  </script>
</head>

<body class="login">
  <div class="full-height">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11">
          <form action="" method="post" class="bg-light py-2 px-4 rounded" onsubmit="return validatePasswords()">
            <h1 class="regis mb-3">Registrasi</h1>
            <div class="row">
              <div class="col-lg-6 col-6 mb-2">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
              </div>
              <div class="col-lg-6 col-6 mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <div class="col-lg-6 col-6 mb-2">
                <label for="hp" class="form-label">No Hp</label>
                <input type="text" name="hp" class="form-control" id="hp" oninput="validatePhoneNumber(this)" required>
                <small id="phone_error" class="text-danger"></small>
              </div>
              <div class="col-lg-6 col-6 mb-2">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control" id="password" required>
                  <span class="input-group-text" onclick="togglePassword('password', 'password_icon')">
                    <i id="password_icon" data-feather="eye-off"></i>
                  </span>
                </div>
              </div>
              <div class="col-lg-6 col-6 mb-2">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                  <span class="input-group-text" onclick="togglePassword('confirm_password', 'confirm_password_icon')">
                    <i id="confirm_password_icon" data-feather="eye-off"></i>
                  </span>
                </div>
              </div>
              <div class="col-12 mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" required>
              </div>
              <div class="col-12 mb-2 d-flex gap-3">
                <label class="form-label">Jenis Kelamin : </label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="Laki-Laki" required>
                  <label class="form-check-label" for="male">Laki-Laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan" required>
                  <label class="form-check-label" for="female">Perempuan</label>
                </div>
              </div>
              <div class="col-12 my-2 text-center">
                <button class="button btn-inti" name="daftar" id="daftar">Daftar</button>
                <p class="mt-2">Sudah punya akun ? <a href="../login.php">Login</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    feather.replace(); // Render icons
  </script>
</body>

</html>
 