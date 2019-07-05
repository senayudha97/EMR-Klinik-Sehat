<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>
  <head>

    <?php
    session_start();
      if ($_SESSION['akses'] !== "bidan") {
          header('location:index.php?pesan=belumlogin');
        }

      $id  = $_GET['id'];

if (isset($_POST['insert_bidan'])) {
  $tindakan   = $_POST['tindakan'];
  $diagnosa   = $_POST['diagnosa'];
  $dokter     = $_POST['dokter'];

  $sql = "UPDATE `tb_rekam_medis` SET tindakan='$tindakan', diagnosa = '$diagnosa', dokter = '$dokter' WHERE id = '$id'";
  $result_update  = mysqli_query($conn,$sql);

  header('location:login_bidan.php');
}
     ?>

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
            <a class="nav-link js-scroll-trigger" href="#isidata">Isi Data Pasien</a>
          </li>
          <li class="nav-item">
            <a href="login_bidan.php" class="btn btn-danger js-scroll-trigger">Kembali</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isidata">
        <div class="my-auto">
          <h2 class="mb-5">Isi Data  <span style="color:#35a82d" > Pasien </span></h2>
        <form class="" action="" method="post">
          <br>
          <?php
          $sql = "SELECT * FROM tb_rekam_medis WHERE id = '$id'";
          $result = mysqli_query($conn,$sql);

          while ($row = $result->fetch_assoc()) {
           ?>
           <form class="" action="" method="post">
          <table cellspacing="0" cellpadding="10">
            <tr>
              <td>
                <label for="">RM-Lama</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['rm_lama']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Nama Pasien</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['nama_pasien']; ?></label>
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
                <label for=""><?php echo $row['jk']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Tanggal Masuk</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['tgl_masuk']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Keluhan</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['keluhan']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Tensi</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['tensi']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Suhu Tubuh</label>
              </td>
              <td>
                :
              </td>
              <td>
                <label for=""><?php echo $row['suhu']; ?></label>
              </td>
            </tr>
            <tr>
              <td>
                <label for="">Diagnosa</label>
              </td>
              <td>
                :
              </td>
              <td>
                <textarea name="diagnosa" rows="5" cols="80"><?php echo $row['diagnosa']; ?></textarea>
              </td>
            </tr>
            <tr>
            <tr>
              <td>
                <label for="">Tindakan</label>
              </td>
              <td>
                :
              </td>
              <td>
                <textarea name="tindakan" rows="5" cols="80"><?php echo $row['tindakan']; ?></textarea>
              </td>
            </tr>

              <td>
                <label for="">Bidan</label>
              </td>
              <td>
                :
              </td>
              <td>
                  <?php
                  $user1 = $_SESSION['username'];
                  $result_user1  = mysqli_query($conn, "SELECT nama FROM tb_bidan WHERE username = '$user1'");
                  while ($row = $result_user1->fetch_assoc()) {
                    ?> <input type="text" class="form-control" readonly name="dokter" value="<?php echo $row['nama']; ?>"> <?php
                  }
                   ?>
                </td>
            </tr>
            <tr>
              <td colspan="3">
                <center>
                <input type="submit" name="insert_bidan" class="btn btn-success" value="Proses">
              </center>
              </td>
            </tr>
          </table><?php } ?></form>
        </div>
      </section>




   <!--  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="logout">
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




 ?>
