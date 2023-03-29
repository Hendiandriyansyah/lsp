<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keakhlian = $_POST['kompetensi_keakhlian'];
// update data ke database
mysqli_query($koneksi,"update kelas set nama_kelas='$nama_kelas', kompetensi_keakhlian='$kompetensi_keakhlian' where id_kelas='$id_kelas'");

// mengalihkan halaman kembali ke index.php
header("location:kelas.php?info=update");

?>