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
<html>


<head>
  <title> Login </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class=tengah>
    <div class="tengah2">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <h2>Login Akun</h2>
      <p>Login terlebih dahulu untuk melihat daftar penjualan.</p>
      
      <div class="card mb-3 shadow p-2 mb-1" style="max-width: 940px; background-color: #D2DAFF; border-width: 0px; ">
        <div class="row g-0">
          <div class="card-body">
            <h5 class="card-title">Akun Anda</h5>
            <!-- <form method="post" action="cek_login.php">
              <table>
                <tr>
                  <td>Email</td>
                  <td><input type="text" name="email" placeholder="Masukkan Email" required></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input type="password" name="pass" placeholder="Masukkan Password" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><a href="signup.php">Belum memiliki akun? Daftar sekarang!</a></td>
                  </td>
                <tr>
                  <td></td>
                  <td><input type="submit" value="Login"></td>
                </tr>
                <tr> -->
            <form method="post" action="cek_login.php">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" placeholder="Email anda" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" required name="pass" placeholder="Password anda" class="form-control" id="exampleInputPassword1">
              </div>

              <!-- <div class="mb-4">
                <a href="signup.php">Belum memiliki akun? Daftar sekarang!</a>
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <td></td>
            <td>
              <?php
              if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                  echo "Email atau password akun salah!";
                } else if ($_GET['pesan'] == "login") {
                  echo "login berhasil";
                  header("location:list_barang.php");
                  exit();
                }
              }
              ?>
            </td>
            <!-- </tr>
              </table>
            </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


</html>