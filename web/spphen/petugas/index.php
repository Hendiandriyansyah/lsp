<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../login.php?info=login");
}

?>
<?php 
date_default_timezone_set('Asia/Jakarta');
$judul = "Dashboard";
include '../koneksi.php';
//include '.../petugas.php';
include '../layouts/header.php';
include '../layouts/navbar.php';
$id_petugas = $_SESSION['id_petugas'];
$nama_Petugas= $_SESSION['nama_petugas'];
/*$kekurangan = $d_siswa['nominal']-$data_pembayaran['jumlah_bayar'];*/

              $jml = 0;
              $query  = "SELECT count(id_petugas) AS jmlh FROM petugas";
              $sql    = mysqli_query($koneksi, $query);
              if(mysqli_num_rows($sql)>0){
                $data = mysqli_fetch_assoc($sql);
                $jmlh  = $data['jmlh'];
              } 

              /*$jml = 0;
              $query  = "SELECT sum() AS jmlh FROM petugas";
              $sql    = mysqli_query($koneksi, $query);
              if(mysqli_num_rows($sql)>0){
                $data = mysqli_fetch_assoc($sql);
                $jmlh  = $data['jmlh'];
              } */

  $sql   = "SELECT count(id_kelas) as id FROM kelas";
  $query = mysqli_query($koneksi, $sql);
  $data  = mysqli_fetch_array($query);
  $id   = $data['id'];

  $jml = 0;
              $query  = "SELECT count(nisn) AS nisn FROM siswa";
              $sql    = mysqli_query($koneksi, $query);
              if(mysqli_num_rows($sql)>0){
                $data = mysqli_fetch_assoc($sql);
                $nisn  = $data['nisn'];
              } 
      
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content-header">
  <div class="card card-warning card-outline">
  <div class="d-none d-sm-inline-block ml-md-3 my-2 my-md-0 mw-100 p" >
    <marquee width="95%" behavior="" direction="left">Selamat Datang Di Halaman Dashboard Petugas Dari Aplikasi pembayaran SPP N UNIVERSITY Sekarang Tanggal <?= date('d-M-Y');?> jam - <?=date('h:i:s a');?></marquee> 
  </div>
    <div class="container">
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="col-lg-12">
      </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="row mt-4">
      <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-warning shadow h-100 py-2"
          style="
            margin-left: 9px;
                  ">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-warning text-uppercase mb-1">Pendapatan
                  </div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($jml); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
              
        <div class="col-xl-3 col-md-6 mb-2">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-primary text-uppercase mb-1">
                  jumlah kelas</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($id); ?> kelas</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-building fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="col-xl-3 col-md-6 mb-2">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="petugas.php">
                    <div class="font-weight-bold text-danger text-uppercase mb-1 ">
                    JUMLAH PEGAWAI</div></a>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($jmlh); ?> </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-user fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>-->
    </div>
    <div class="row">
        <!-- Total Pendapatan -->
        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-danger shadow h-40 py-2"
          style="margin-left: 9px;">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <a href="petugas.php">
                  <div class="font-weight-bold text-danger text-uppercase mb-1">
                  JUMLAH PEGAWAI</div></a>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($jmlh); ?> Orang </div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-gift fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Penerimaan Hari ini -->
        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-warning shadow h-40 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="font-weight-bold text-warning text-uppercase mb-1">jumlah siswa
                  </div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($nisn); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> </div>
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
include '../layouts/footer.php';
?>