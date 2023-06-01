<html>

<head>
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <div class=tengah>
        <div class="tengah2">
            <h2 class="card-title">Daftar Akun Pegawai</h2>
            </br>

            <div class="card mb-3 shadow p-2 mb-1" style="width: 440px; background-color: #D2DAFF; border-width: 0px; ">
                <div class="card-body">
                    <a href="list_barang.php">

                    </a>


                    <h3>Daftar</h3>
                    <form method="post" action="tambah_aksi_akun.php">
                        <table cellpadding="10" style="width:380">
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" class="form-control" placeholder="Masukkan username" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" class="form-control" placeholder="Masukkan Email" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="pass" class="form-control" placeholder="Masukkan Password" required></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="jenis_akun" value="2"></td>
                            </tr>
                            <!-- <tr>
                <td>Jenis Akun</td>
                <td>
                    <select name="jenis_akun">
                        <option value="">Pilih</option>
                        <option value="1">Manager</option>
                        <option value="2">Karyawan</option>
                    </select>
                </td>
            </tr> -->
                            <!-- <tr>
                <td></td>
                <td><a href="login.php">Sudah memiliki akun? Masuk sekarang!</a></td>
                </td>
            <tr> -->

                        </table>
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "akun_sama") {
                                echo "Email atau Username ini sudah pernah dibuat, harap menggunakan email lain! </br> </br>";
                            }
                        }
                        ?>
                        
                        <input type="submit" value="Daftar" class="btn btn-primary" style="width:100px; ">
                    </form>
                    <a href="list_barang.php">
                        <button class="btn btn-light" style="width:100px; ">Kembali</button>
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