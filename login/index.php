<?php 
require "../config/functions.php";
require "../config/site-name.php";

$isFalse = FALSE;
$message = '';

if(isset($_SESSION['username'])){
  $url = BASE_URL;
  header("Location: $url");
}

if(isset($_POST['username']) && isset($_POST['password'])){
  require "../config/koneksi.php";
  //Buka koneksi
  $conn = open_connection();

  //membuat query mySQL
  $query = "SELECT * FROM tb_users WHERE username = '$_POST[username]' AND password_hash = MD5('$_POST[password]') ";

  //Eksekusi Query
  $hasil = mysqli_query($conn, $query);

  //Baca hasil, kalau berhasil kita pindah halaman, jika gagal muncul pesan
  if($isi = mysqli_fetch_assoc($hasil)){
    $_SESSION['username'] = $isi['username'];
    $_SESSION['nama_user'] = $isi['nama_user'];
    $_SESSION['deskripsi_user'] = $isi['deskripsi_user'];
    $_SESSION['foto_user'] = $isi['foto_user'];
    
    $url = BASE_URL;
    header("Location: $url");
  } else {
    $isFalse = TRUE;
    $message = "username dan password salah";
  }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In... | <?= $siteName ?></title>
  <link rel="icon" type="image/x-icon" href="../assets/img/tutwurihandayani-logo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <?php if ($isFalse): ?>
      <div class="alert alert-danger" id="fadeOut">
        <?= $message ?>
      </div>
    <?php endif ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= BASE_URL ?>" title="<?= $siteName ?>" class="logo logo-large">
          <img class="img-fluid" src="<?= BASE_URL . 'assets/img/smkn19jkt.png' ?>" alt="">
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Log In !</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

<script>
  // Fun Fade Out
  $('#fadeOut').delay(1500).fadeOut(1000).fadeOut("slow");
</script>
</body>
</html>
