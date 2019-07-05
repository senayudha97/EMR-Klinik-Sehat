<?php
include "koneksi.php";
session_start();
  if ($_SESSION['akses'] !== "bidan") {
      header('location:index.php?pesan=belumlogin');
    }
 ?>

<?php
if (isset($_POST['cari_rm_lama'])) {
  $pattern    = $_POST['rmlama'];
  $hasilcari        = "SELECT * FROM `tb_rekam_medis` WHERE rm_lama LIKE '%$pattern%'";
}elseif (isset($_POST['cari_tgl_msk'])) {
  $pattern    = $_POST['tgl_msk'];
  $hasilcari        = "SELECT * FROM `tb_rekam_medis` WHERE tgl_masuk LIKE '%$pattern%' AND poli='Poli Kebidanan'";
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

    <script type="text/javascript">
      function getfocus() {
        document.getElementsById("tampil").focus();
      }
    </script>
  </head>

  <body id="page-top" onload="getfocus();">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#35a82d" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Klinik Sehat</span>
        <span class="d-none d-lg-block">
          <?php
            $user = $_SESSION['username'];
            $result_user  = mysqli_query($conn, "SELECT nama FROM tb_bidan WHERE username = '$user'");
            while ($row = $result_user-> fetch_assoc()) {
           ?>
          <span class="btn btn-success"><marquee>Selamat Datang Petugas : <?php echo $row['nama'];} ?>  </marquee></span><br><br>
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
          <?php echo '<form>
          <li class="nav-item">
            <a class="btn btn-danger js-scroll-trigger" onClick="javascript:history.go(-1)">Kembali</a>
          </li>
          </form>';?>
<!--           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#isidata">Isi Data Rekam Medis</a>
          </li>

          <li class="nav-item">
            <a class="btn btn-danger js-scroll-trigger" href="#logout">Log Out</a>
          </li> -->
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampil">
        <div class="my-auto">
          <h2 class="mb-5">Tampil Data <span style="color:#35a82d" > Rekam Medis </span></h2>
        <form class="" action="" method="post">
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
            <th>Dokter</th>
            <th>Selengkapnya</th></thead>
            <tr>
              <?php
              // $sql="SELECT * FROM tb_rekam_medis";
              $result = mysqli_query($conn,$hasilcari);
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
              <td colspan="12">
                <a href="report.php">Cetak Report PDF</a>
              </td>
            </tr>
          </table>
        </div>
      </section>

     <!--  <form class="" action="insert.php" method="POST">
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="isidata">
          <div class="my-auto">
            <h2 class="mb-0">Form isi
              <span style="color:#35a82d" >Rekam Medis</span>
            </h2>
            <br>
            <table  cellspacing="0" cellpadding="10">
              <tr>
                <td>
                  <label for="">Rekam Medis Baru</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="rmbaru" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Rekam Medis Lama</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="rm_lama" class="form-control" >
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
                  <input type="text" name="jeneng" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Usia</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="number" name="usia" class="form-control" >
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
                  <span>
                  <input type="radio" name="jk" value="L">Laki-Laki
                  </span>
                  <span>
                  <input type="radio" name="jk" value="P">Perempuan
                  </span>
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
                  <textarea name="alamat" rows="3" cols="50"></textarea>
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
                  <input type="text" name="tgl_masuk" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">No HP/Telepon</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="telepon" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Tindakan</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="tindakan" class="form-control" >
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
                  <input type="text" name="diagnosa" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Penjamin</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="penjamin" class="form-control" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Poli</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <select class="form-control" name="poli">
                  <option value="">Pilih Poli..</option>
                  <option value="poli_umum">Poli Umum</option>
                  <option value="poli_gigi">Poli Gigi</option>
                  <option value="poli_kebidanan">Poli Kebidanan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Petugas</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <select class="form-control" name="petugas">
                  <option value="">Pilih Petugas..</option>
                  <option value="A" >A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="">Dokter</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <select class="form-control" name="dokter">
                  <option value=""  >Pilih Dokter..</option>
                  <option value="A" >A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <center>
                  <input type="submit" class="btn btn-success" name="insert_rm" value="Proses">
                  </center>
                </td>
              </tr>
            </table>
            </form>
        </section> -->

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
    <script>
      document.getElementsById("auto")[0].click();
    </script>
  </body>

</html>
