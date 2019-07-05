<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>
  <head>

    <?php
    session_start();
      if ($_SESSION['akses'] !== "admin") {
          header('location:index.php?pesan=belumlogin');
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
          <span class="btn btn-success"><marquee>Selamat Datang Admin : <?php echo $row['nama'];} ?>  </marquee></span><br><br>
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
            <a class="btn btn-danger js-scroll-trigger" href="login_admin.php">Kembali</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampil">
        <div class="my-auto">
          <h2 class="mb-5">Tampil Data <span style="color:#35a82d" > Rekam Medis </span></h2>
          <form class="" action="" method="post">
          <table border="0" cellspacing="0" cellpadding="13">
            <tr>
              <?php
              $id = $_GET['id'];
              $sql="SELECT * FROM tb_penjamin WHERE id = '$id'";
              $result = mysqli_query($conn,$sql);
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
              <td>
                <label for="">Nama Penjamin</label>
              </td>
              <td>:</td>
              <td>
                <input type="text" class="form-control" name="penjamin" value="<?php echo $row['penjamin']; ?>">
              </td>
              <td>
                <input type="submit" class="btn btn-warning" name="edit" value="Edit">
              </td>
            </tr>
            <?php } ?>
          </table>
          <?php
          if (isset($_POST['edit'])) {
            $penjamin = $_POST['penjamin'];

            $update = "UPDATE `tb_penjamin` SET `penjamin`='$penjamin' WHERE id = '$id'"; $result_update = mysqli_query($conn, $update);

            if ($result_update) {
              header('location:tampil_penjamin.php');
            }
          }

           ?>
        </div>
      </section>
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="logout">
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
      </section>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
