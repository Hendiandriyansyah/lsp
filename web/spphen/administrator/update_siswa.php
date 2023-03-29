<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];
// update data ke database
mysqli_query($koneksi,"update siswa set nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' where nisn='$nisn'");

// mengalihkan halaman kembali ke index.php
header("location:siswa.php?info=update");

?>