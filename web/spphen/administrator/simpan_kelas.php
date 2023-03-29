<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keakhlian = $_POST['kompetensi_keakhlian'];

// menginput data ke database
mysqli_query($koneksi,"insert into kelas values('','$nama_kelas','$kompetensi_keakhlian')");

// mengalihkan halaman kembali ke index.php
header("location:kelas.php?info=simpan");

?>