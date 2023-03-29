<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_petugas = $_POST['id_petugas'];
$nisn = $_POST['nisn'];
$tanggal_bayar = date('Y-m-d');
$bulan_dibayar = $_POST['bulan_dibayar'];
$tahun_dibayar = $_POST['tahun_dibayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];

// menginput data ke database
mysqli_query($koneksi,"insert into pembayaran values('','$id_petugas','$nisn','$tanggal_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_bayar')");

// mengalihkan halaman kembali ke index.php
header("location:transaksi_pembayaran.php?info=simpan");

?>