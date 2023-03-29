<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nisn = $_POST['nisn'];
$nis = ($_POST['nis']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from siswa where nisn='$nisn' and nis='$nis'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['nisn'] = $nisn;
	$_SESSION['nis'] = $nis;
	$_SESSION['nama'] = $nama;
	$_SESSION['status'] = "login";
	header("location:siswa/index.php");
}else{
	header("location:index.php?info=gagal");
}
?>