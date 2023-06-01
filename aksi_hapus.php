<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form

$no = $_POST['no_hapus'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga_barang = $_POST['harga_barang'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$aktivitas_perubahan = "Barang Dihapus";


// menginput data ke database
mysqli_query($koneksi, "insert into log_barang values
('','$nama_barang','$jumlah_barang','$harga_barang','$aktivitas_perubahan','$tanggal','$jam')");

mysqli_query($koneksi, "delete from list_barang where no='$no'");

?>

<?php header("location:list_barang.php"); ?>
