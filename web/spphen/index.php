
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPP Prima</title>

  <style>
    body{
      /* Gambar Login */
      background-image: url("assets/dist/img/sppprima.png");
      background-size: cover;
      background-repeat: no-repeat;
      /* Posisi Gambar */
      background-position-y: 80%;
    }
  </style>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <!--<div class="login-logo">
      <a href="assets/index2.html"><b>Aplikasi Pembayaran SPP</b></a>
    </div>-->
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">LOGIN SEBAGAI SISWA</p>
        <hr>
        <?php 
        if(isset($_GET['info'])){
          if($_GET['info'] == "gagal"){ ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Mohon Maaf</h5>
              Login gagal! username dan password salah!
            </div>
          <?php } else if($_GET['info'] == "logout"){ ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Terima Kasih</h5>
              Anda telah berhasil logout
            </div>
          <?php }else if($_GET['info'] == "login"){ ?>
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info"></i> Mohon Maaf</h5>
              Anda harus login terlebih dahulu
            </div>
          <?php } } ?>
          <br>

          <form action="cek_login_siswa.php" method="post">
            <div class="input-group mb-3">
              <input type="text" name="nisn" class="form-control" placeholder="NISN">
              <div class="input-group-append">
                <div class="input-group-text">
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="nis" class="form-control" placeholder="NIS">
              <div class="input-group-append">
                <div class="input-group-text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg">Masuk</button>
              </div>            
              <div class="col-12">
                <hr>
                <a href="login.php" class="btn btn-block bg-gradient-warning btn-lg">Halaman Login Petugas</a>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
  </body>
  </html>
