<!DOCTYPE html>

<head>
    <title>Log Barang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="navbar-spacing"></div>

    <nav class="navbar navbar-expand-lg fixed-top shadow-sm p-2 mb-1" style="background-color: #B1B2FF;">
        <div class="container-fluid">
            <a class="navbar-brand" style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><b>Log Barang</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    include 'koneksi.php';
                    session_start();
                    $email      = $_SESSION['email'];
                    $data       = mysqli_query($koneksi, "select * from akun where email='$email' ");
                    $cek        = mysqli_num_rows($data);

                    if ($cek > 0) {
                        $baris = mysqli_fetch_assoc($data);

                        if ($baris['jenis'] == 1) {
                    ?>
                            <a href="list_barang.php">
                                <button class="btn btn-light">List Barang</button>
                            </a>
                            <a href="signup.php">
                                <button class="btn btn-light">Buat Akun Pegawai</button>
                            </a>

                    <?php
                        }
                    }
                    ?>
                    <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->
                </ul>
                <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                <form action="logout.php">
                    <button type="submit" class="btn btn-primary" value="Logout">Logout</button>
                </form>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <?php
        // session_start();
        if (!isset($_SESSION['email'])) {
            header("location:login.php");
        }
        $username = $_SESSION['username'];
        echo "Selamat Datang $username. <br>
        Menampilkan Log Barang Pada Toko Anda. <br>";


        ?>

</br>

        <?php
        include 'koneksi.php';


        // Langkah 1. Tentukan batas, cek halaman & posisi data
        $batas = 5;
        $halaman = @$_GET['halaman'];
        if (empty($halaman)) {
            $posisi = 0;
            $halaman = 1;
        } else {
            $posisi = ($halaman - 1) * $batas;
        }
        $no = $posisi + 1;
        // Langkah 2: Hitung total data dan halaman serta link 1,2,3

        $query2     = mysqli_query($koneksi, "select * from log_barang");
        $jmldata    = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata / $batas);

        echo "<p>Banyak Log : <b>$jmldata</b> barang</p>";
        ?>


        <a href="hapus_log.php">
            <button class="btn btn-outline-danger">Hapus Seluruh Log</button>
        </a>
        </br>
        </br>
        <div class="shadow p-3 mb-5 bg-body rounded">
            <table class="table" cellpadding="10" style="text-align:center; justify-content: center;">
                <tr style="background-color: #D2DAFF;">
                    <th>NO</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Barang</th>
                    <th>Aktivitas Perubahan</th>
                    <!-- <th>Potongan Harga</th>
            <th>Harga Total</th>
            <th>Metode Pembayaran</th> -->
                    <th>Waktu Perubahan</th>
                    <!-- <th>OPSI</th> -->
                </tr>
                <?php




                // Langkah 3. Sesuaikan query dengan posisi dan batas
                $query = "select * from log_barang LIMIT $posisi, $batas";

                $data = mysqli_query($koneksi, $query);
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td><?php echo $d['jumlah_barang']; ?></td>
                        <td><?php echo $d['harga_barang']; ?></td>
                        <td><?php echo $d['perubahan']; ?></td>
                        <td><?php echo $d['tanggal']; ?> | <?php echo $d['jam']; ?></td>

                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
        <div class="flex-pagination">
            <?php
            echo "<b>Halaman : </b> ";
            ?>
            <div class="pagination">
                <?php
                for ($i = 1; $i <= $jmlhalaman; $i++)
                    if ($i != $halaman) {
                ?>

                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo "$i" ?></a></li>


                <?php
                    } else {
                ?>

                    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo "$i" ?></a></li>

                <?php
                    }
                ?>
            </div>
        </div>
</body>

</html>

<style>
    .samping {
        display: flex;
        justify-content: center;

    }

    .tombol-atas {
        display: flex;
        margin: 0px 0px 20px;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        margin: 0px 5px 0px;
    }

    .navbar-spacing {
        padding-top: 70px;
    }

    .pagination {
        margin-left: 10px;
    }

    .flex-pagination {
        display: flex;
    }

    body {
        background-color: #EEF1FF;
    }
</style>