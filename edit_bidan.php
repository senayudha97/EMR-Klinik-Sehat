<?php 
include "koneksi.php";
    session_start();
      if ($_SESSION['akses'] !== "admin") {
          header('location:index.php?pesan=belumlogin');
        }
      $username  = $_GET['username'];

if (isset($_POST['update_data'])) {

      $username  = $_GET['username'];
        $id            = $_POST['id'];
        $nama          = $_POST['nama'];
        $username      = $_POST['username'];
        $password      = $_POST['password'];
        $jk            = $_POST['jk'];
        $lahir         = $_POST['lahir'];
        $alamat        = $_POST['alamat'];
        
        $sql_update1 = "UPDATE tb_bidan SET nama       ='$nama',
                                              username   ='$username',
                                              password   ='$password',
                                              jk         ='$jk',
                                              lahir      ='$lahir',
                                              alamat     ='$alamat' WHERE username ='$username'";
        $result1= mysqli_query($conn,$sql_update1);
        $sql_update2 = "UPDATE tb_login SET nama       ='$nama',
                                        username   ='$username',
                                        password   ='$password' WHERE username ='$username'";
        $result2 = mysqli_query($conn,$sql_update2);

    // if (!$result1 || !$result2) {
    //    printf("Errormessage: %s\n", $mysqli->error);
    // }
    // else {
    //   header('location:login_admin.php?id=#tampilpetugas');
    // }
      header('location : login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>


    <link rel="icon" href="img/ikon.ico" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMR Klinik Sehat</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#35a82d" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Klinik Sehat</span>
        <span class="d-none d-lg-block">
          <?php
            $user = $_SESSION['username'];
            $result_user  = mysqli_query($conn, "SELECT nama FROM tb_login WHERE username = '$user'");
            while ($row = $result_user-> fetch_assoc()) {
           ?>
          <span class="btn btn-success"><marquee>Selamat Datang Bidan : <?php echo $row['nama'];} ?>  </marquee></span><br><br>
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/logo1.png" alt="">
        </span>
      </a>
      <br>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#isidata">Data Lengkap Pasien</a>
          </li>
          
          <li class="nav-item">
            <a href="login_admin.php?id=#tampilbidan" class="btn btn-danger js-scroll-trigger" >Kembali</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isidata">
        <div class="my-auto">
          <h2 class="mb-5">Data Lengkap  <span style="color:#35a82d" > Bidan </span></h2>
        <form class="" action="" method="post">
          <br>
          <?php
          $sql = "SELECT * FROM tb_bidan WHERE username = '$username'";
          $result = mysqli_query($conn,$sql);
          while ($row = $result->fetch_assoc()) {
           ?>
           <form class="" action="" method="post">
          <table cellspacing="0" cellpadding="10">
            <tr>
              <td>
                <label for="">Nama</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Username</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" readonly name="username" value="<?php echo $row['username']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Password</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Jenis Kelamin</label>
              </td>
              <td>
                :
              </td>
              <td>
<!--                 <input type="text" class="form-control" name="jk" value="<?php echo $row['jk']; ?>"> -->
              <select class="form-control" name="jk">
                  <?php if ($row['jk'] == 'P'): ?>
                    {
                    <!-- <option value="<?php echo $row['akses']; ?>"><?php echo $row['akses']; ?></option> -->
                      <option value="P">Perempuan</option>
                      <option value="L">Laki-Laki</option>
                    }
                    <?php elseif ($row['jk'] == 'L'): ?> {
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    }: ?>
                  <?php endif ?>
                  </select>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Lahir</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" name="lahir" value="<?php echo $row['lahir']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Alamat</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <center>
                <input type="submit" name="update_data" class="btn btn-warning" value="Update">
              </center>
              </td>
            </tr>
          </table><?php } ?></form>
        </div>
      </section>

  <!--   <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="logout">
      <div class="my-auto">
        <h2>Anda Yakin Mau Log-Out?</h2>
        <br><br>
        <table cellpadding="15">
          <tr>

            <td>
              <a href="logout.php" class="btn btn-danger">Ya!</a>
            </td>
            <td>
              <a href="#tampil" class="btn btn-success">Tidak!</a>
            </td>
          </tr>
        </table>
      </div>
    </section> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
  </body>
</html>
