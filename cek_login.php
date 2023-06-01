<?php
session_start();
include "koneksi.php";

$email      = $_POST['email'];
$pass       = $_POST['pass'];

$data       = mysqli_query($koneksi,"select * from akun where email='$email' and password='$pass'");
$cek        = mysqli_num_rows($data);
print_r($cek);

if ($cek>0){ 
    $baris = mysqli_fetch_assoc($data);
    $_SESSION ['email'] = $email;
    $_SESSION ['pesan'] = "";
    $_SESSION ['username'] = $baris['username'];
    
    header ("location:login.php?pesan=login");
}

else {
    header ("location:login.php?pesan=gagal");
}


?>