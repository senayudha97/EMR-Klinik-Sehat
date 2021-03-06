<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>
  <head>

    <?php
    session_start();
      if ($_SESSION['akses'] !== "bidan") {
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
            <a class="nav-link js-scroll-trigger" href="#tampil">Tampil Data Rekam Medis</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger js-scroll-trigger" href="#logout">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampil">
        <div class="my-auto">
          <h2 class="mb-5">Tampil Data <span style="color:#35a82d" > Rekam Medis </span></h2>
        <form class="" action="bidan_cari.php" method="post">
          <table border="0" cellpadding="10">
            <tr>
              <td>
                <label for="" style="color:#35a82d;"><b>Cari Tanggal Kunjungan</b></label>
              </td>
              <td>:</td>
              <td>
<!--                 <input type="text" name="rmlama" class="form-control" value=""> -->
                <input type="date" name="tgl_msk" class="form-control" >
              </td>
              <td>
                <input type="submit" class="btn btn-success" name="cari_tgl_msk" value="Cari">
              </td>
            </tr>
            </form>
          </table>
          <br>
          <table border="1" cellspacing="0" cellpadding="13">
            <thead class="bg-dark">
              <th>Rekam Medis</th>
              <th>No BPJS </th>
              <th>Nama Pasien</th>
              <th>Tanggal Masuk</th>
              <th>Diagnosa</th>
              <th>Tindakan</th>
              <th>Keluhan</th>
              <th>Tensi</th>
              <th>Suhu Tubuh</th>
            <th>Petugas</th>
            <th>Bidan</th>
            <th>Selengkapnya</th></thead>
            <tr>
              <?php
              if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                $page_no = $_GET['page_no'];
              } else {
                $page_no = 1;
              }
              $total_records_per_page = 5;
              $offset = ($page_no - 1) * $total_records_per_page;
              $previous_page = $page_no - 1;
              $next_page = $page_no + 1;
              $adjacents = "2";

              $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `tb_rekam_medis`");
              $total_records = mysqli_fetch_assoc($result_count);
              $total_records = $total_records['total_records'];
              $total_no_of_pages = ceil($total_records / $total_records_per_page);
              $seconnd_last = $total_records_per_page - 1;

              $result = mysqli_query($conn,"SELECT * FROM `tb_rekam_medis` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
              while ($row = mysqli_fetch_assoc($result)) {?>
                <td><?php echo $row['rm_lama']; ?></td>
                <td><?php echo $row['no_bpjs']; ?></td>
                <td><?php echo $row['nama_pasien']; ?></td>
                <td><?php echo $row['tgl_masuk']; ?></td>
                <td><?php echo $row['diagnosa']; ?></td>
                <td><?php echo $row['tindakan']; ?></td>
                <td><?php echo $row['keluhan']; ?></td>
                <td><?php echo $row['tensi']; ?></td>
                <td><?php echo $row['suhu']; ?></td>
                <td><?php echo $row['petugas']; ?></td>
                <td><?php echo $row['dokter']; ?></td>
                <td>
                  <a href="insert_bidan.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">More</a>
                </td>
            </tr>
                <?php } ?>
                <tr>
                  <td <td colspan="12">

                      <a <?php if ($page_no > 1) { echo "href='?page_no=$previous_page'";} ?>>Previous</a>

                    <?php
                    if ($total_no_of_pages <= 10) {
                      for ($counter=1; $counter <= $total_no_of_pages ; $counter++) {
                        if ($counter == $page_no) {
                          echo "<a>$counter</a>"."-";
                        }else {
                          echo "<a href='?page_no=$counter'>$counter</a>"."-";
                        }
                      }
                    }
                    ?>

                      <a <?php if ($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>-

                    <?php if ($page_no < $total_no_of_pages) {
                      echo "<a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a>";
                    } ?>
                  </td>
                </div>
                </tr>
            <tr>
              <td colspan="12">
                <a href="report.php">Cetak Report PDF</a>
              </td>
            </tr>
          </table>
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
