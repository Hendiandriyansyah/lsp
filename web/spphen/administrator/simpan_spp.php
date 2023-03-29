<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

// menginput data ke database
mysqli_query($koneksi,"insert into spp values('','$tahun','$nominal')");

// mengalihkan halaman kembali ke index.php
header("location:spp.php?info=simpan");

?>