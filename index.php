<!DOCTYPE html>
<html lang="en">
  <head>

    <?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'gagal') {
          echo '<script type="text/javascript">
            alert("Password Yang Anda Masukan Tidak Sesuai");
          </script>';
        }elseif ($_GET['pesan'] == 'belumlogin') {
          echo '<script type="text/javascript">
            alert("Login Terlebih Dahulu");
          </script>';
        }
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

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">
  <form class="" action="cek_login.php" method="post">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#35a82d" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Klinik Sehat</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/logo1.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#login">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Klinik
            <span style="color:#35a82d" >Sehat</span>
          </h1>
          <div class="subheading mb-5" >Medical clinic
            <a href="#" style="color:#35a82d"> (0341) 5034129</a>
          </div>
          <p class="lead mb-5">Ruko kav 7 kepuharjo Jalan Raya karangploso, kav 7 karangploso malang, Karangploso Wetan, Kepuharjo, Karangploso, Malang, Jawa Timur 65152</p>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="login">
        <div class="my-auto">
          <h2 class="mb-5">Login</h2>
          <br>
            <h5 class="mb-0">Username</h5>
            <input type="text" class="form-control" name="username" required>
          <br>
            <h5 class="mb-0">Password</h5>
            <input type="password" class="form-control" name="password" required>
          <br>
            <br>
            <input type="submit" name="login" class="btn btn-success" value="Login">

        </div>
      </section>
    </form>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
