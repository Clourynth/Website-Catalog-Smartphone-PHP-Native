<?php
// koneksi database
include 'koneksi.php';

// update data ke database
mysqli_query($koneksi, "DELETE FROM log_barang");

header("location:log_barang.php");
?>