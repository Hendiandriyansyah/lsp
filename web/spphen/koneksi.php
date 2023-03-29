<?php 
$koneksi = mysqli_connect("localhost","root","","db-spphenwb");

// Check connection
if (!$koneksi) {
    echo "<h1 align='center'>Database tidak terhubung!</h1>";
    exit();
}

?>