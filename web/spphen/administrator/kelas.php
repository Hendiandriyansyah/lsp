<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../login.php?info=login");
}

?>
<?php 
include '../layouts/header.php';
include '../layouts/navbar.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Kelas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h5>Data Kelas</h5>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>            
          </div>
          <div class="card-body">
            <?php 
            if(isset($_GET['info'])){
              if($_GET['info'] == "hapus"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-trash"></i> Sukses</h5>
                  Data berhasil di hapus
                </div>
              <?php } else if($_GET['info'] == "simpan"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses</h5>
                  Data berhasil di simpan
                </div>
              <?php }else if($_GET['info'] == "update"){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-edit"></i> Sukses</h5>
                  Data berhasil di update
                </div>
              <?php } } ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keakhlian</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  include "../koneksi.php";
                  $kelas    =mysqli_query($koneksi, "SELECT * FROM kelas");
                  while($d_kelas = mysqli_fetch_array($kelas)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?=$d_kelas['nama_kelas']?></td>
                      <td><?=$d_kelas['kompetensi_keakhlian']?></td>
                      <td>
                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $d_kelas['id_kelas']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_kelas['id_kelas']; ?>"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>                  
                    <div class="modal fade" id="modal-edit<?php echo $d_kelas['id_kelas']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Data Kelas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="update_kelas.php" method="post">
                              <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="id_kelas" value="<?php echo $d_kelas['id_kelas']; ?>" hidden>
                                <input type="text" name="nama_kelas" value="<?php echo $d_kelas['nama_kelas']; ?>" class="form-control" placeholder="Masukan Nama Kelas">
                              </div>
                              <div class="form-group">
                                <label>Kompetensi Keakhlian</label>
                                <input type="text" name="kompetensi_keakhlian" value="<?php echo $d_kelas['kompetensi_keakhlian']; ?>" class="form-control" placeholder="Masukan Kompetensi Keakhlian">
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modal-hapus<?php echo $d_kelas['id_kelas']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Data Kelas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Akan Menghapus Kelas <?php echo $d_kelas['nama_kelas']; ?> Kompetensi Keakhlian <?php echo $d_kelas['kompetensi_keakhlian']; ?> ???</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <a href="hapus_kelas.php?id_kelas=<?php echo $d_kelas['id_kelas']; ?>" class="btn btn-primary">Hapus</a>
                          </div>                       
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data Kelas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="simpan_kelas.php" method="post">
                            <div class="form-group">
                              <label>Nama Kelas</label>
                              <input type="text" name="nama_kelas" class="form-control" placeholder="Masukan Nama Kelas">
                            </div>
                            <div class="form-group">
                              <label>Kompetensi Keakhlian</label>
                              <input type="text" name="kompetensi_keakhlian" class="form-control" placeholder="Masukan Kompetensi Keakhlian">
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include '../layouts/footer.php';
  ?>