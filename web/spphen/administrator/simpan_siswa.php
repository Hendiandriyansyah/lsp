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

// menginput data ke database
mysqli_query($koneksi,"insert into siswa values('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");

// mengalihkan halaman kembali ke index.php
header("location:siswa.php?info=simpan");

?>