<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$jenis_akun = $_POST['jenis_akun'];

$cek = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$username' OR email='$email'");

if (mysqli_num_rows($cek) > 0) {
    header ("location:signup.php?pesan=akun_sama");
    exit;
} else {
 
// update data ke database
mysqli_query($koneksi, "insert into akun values ('$username', '$email', '$pass', '$jenis_akun') ");
}
// mengalihkan halaman kembali ke index.php
header ("location:list_barang.php");
