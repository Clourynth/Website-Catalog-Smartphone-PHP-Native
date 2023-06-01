<?php
date_default_timezone_set('asia/makassar');
?>
<html>

<head>
    <title> Tambah Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class=tengah>
        <div class="tengah2">
            <h2>Tambah Data Barang</h2>

            <div class="card mb-3 shadow p-2 mb-1" style="max-width: 540px; background-color: #D2DAFF; border-width: 0px; ">
                <div class="card-body">
                    <h5 class="card-title">Data Barang</h5>
                    <form method="post" action="tambah_aksi_barang.php" enctype="multipart/form-data">
                        <table cellpadding="10">
                            <tr>
                                <td>Nama Barang </td>
                                <td><input type="text" class="form-control" name="nama_barang"></td>
                            </tr>
                            <tr>
                                <td>Jumlah Barang</td>
                                <td> <input type="number" class="form-control" name="jumlah_barang"></td>
                            </tr>
                            <tr>
                                <td>Harga Barang</td>
                                <td> <input type="number" class="form-control" name="harga_barang"></td>
                            </tr>
                            <tr>
                                <td>Foto Barang</td>
                                <td><input type="file" id="foto" name="foto" class="form-control" onchange="readURL(this);"></td>
                            </tr>
                            <!-- <tr>
                <td>Potongan Harga</td>
                <td> <input type="number" name="potongan_harga"></td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td>
                    <select name="metode_pembayaran">
                        <option value="">Pilih</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                    </select>
                </td>
            </tr> -->
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

                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "bukan_gambar") {
                                echo "File yang anda masukkan bukan gambar!";
                            } else if ($_GET['pesan'] == "gambar_besar") {
                                echo "File gambar yang anda masukkan terlalu besar!";
                                // header("location:list_barang.php");
                                exit();
                            }
                        }
                        ?>

                    </form>

                    <a href="list_barang.php">
                        <button class="btn btn-light" style="width:100px;">Kembali</button>
                    </a>
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