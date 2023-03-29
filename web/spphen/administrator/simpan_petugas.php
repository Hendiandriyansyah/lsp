<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST['level'];

// menginput data ke database
mysqli_query($koneksi,"insert into petugas values('','$username','$password','$nama_petugas','$level')");

// mengalihkan halaman kembali ke index.php
header("location:petugas.php?info=simpan");

?>