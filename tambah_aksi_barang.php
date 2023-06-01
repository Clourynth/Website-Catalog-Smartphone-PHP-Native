<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga_barang = $_POST['harga_barang'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];

$foto = $_FILES['foto']['name'];

$perubahan = "Barang Ditambahkan";

if (isset($_FILES['foto'])) {
    $errors = array();
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $file_type = $_FILES['foto']['type'];
    $file_ext = strtolower(substr(strrchr($file_name, "."), 1));

    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        // header("location:tambah_aksi_barang.php?pesan=bukan_gambar");
        exit;
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
        // header("location:tambah_aksi_barang.php?pesan=gambar_besar");
        exit;
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "images/" . $file_name);
        echo "Success";
    } else {
        print_r($errors);
    }
}

// menginput data ke database
mysqli_query($koneksi, "insert into list_barang values
('','$nama_barang','$jumlah_barang','$harga_barang','$foto')");

mysqli_query($koneksi, "insert into log_barang values
('','$nama_barang','$jumlah_barang','$harga_barang','$perubahan','$tanggal','$jam')");

// mengalihkan halaman kembali ke listmahasiswa.php
header("location:list_barang.php");
?>
