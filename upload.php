<?php

// Pastikan bahwa form telah di submit dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Ambil file yang diunggah
  $image = $_FILES['image']['tmp_name'];

  // Tentukan nama file baru yang akan disimpan
  $new_image_name = "image.jpg";

  // Tentukan lokasi folder tujuan
  $upload_path = "uploads/";

  // Pindahkan file ke folder tujuan
  move_uploaded_file($image, $upload_path . $new_image_name);
}

?>