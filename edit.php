<?php
date_default_timezone_set('asia/makassar');
?>
<html>

<head>
    <title>Edit Data Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class=tengah>
        <div class="tengah2">
            <h2>Edit Data </h2>

            <div class="card mb-3 shadow p-2 mb-1" style="max-width: 940px; background-color: #D2DAFF; border-width: 0px; ">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Barang</h5>
                    <?php
                    include 'koneksi.php';
                    $no = $_GET['no'];
                    $data = mysqli_query($koneksi, "select * from list_barang where no='$no'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <form method="post" action="update.php" enctype="multipart/form-data">
                            <table cellpadding="10" style="width:480">
                                <tr>
                                    <td width="160">Nama Barang</td>
                                    <td>
                                        <input type="hidden" name="no" value="<?php echo $d['no']; ?>">
                                        <input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?> " class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td><input type="number" name="jumlah_barang" value="<?php echo $d['jumlah_barang']; ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Harga Barang</td>
                                    <td><input type="number" name="harga_barang" value="<?php echo $d['harga_barang']; ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Foto barang</br></br></td>
                                    <td><img src="images/<?php echo $d['foto']; ?>" alt="Gambar" width="80" style="display: flex;"></td>
                                </tr>
                                <tr>
                                    <td>Ganti Foto Barang</td>
                                    <td>
                                        <input type="file" id="foto" name="foto" class="form-control" onchange="readURL(this);">
                                    </td>
                                </tr>
                                <tr>
                                <td></td>
                                <td><img id="preview" src="#" alt="Gambar Preview" style="display: none;" width="80"></td>
                                    <!-- <td>Waktu Pembelian</td> -->
                                    
                                    <td><input type="hidden" name="tanggal" value="<?php echo date("Y-m-d") ?>"><input type="hidden" name="jam" value="<?php echo date('H:i:s') ?>"></td>
                                </tr>
                            </table>

                            <div class="submit">
                                <input type="submit" value="Simpan" class="btn btn-primary" style="width:100px;">
                            </div>
                        </form>

                        <a href="list_barang.php">
                            <button class="btn btn-light" style="width:100px;">Kembali</button>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .tengah {
        top: 0;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        background-color: #EEF1FF;
    }
</style>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview')
                    .attr('src', e.target.result)
                    .show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>