<?php
include "koneksi.php";
    session_start();
      if ($_SESSION['akses'] == "") {
          header('location:index.php?pesan=belumlogin');
        }

      $id  = $_GET['id'];
if (isset($_POST['update_data'])) {
        $id           = $_POST['id'];
        $rm_lama      = $_POST['rm_lama'];
        $no_bpjs      = $_POST['no_bpjs'];
        $nama_pasien  = $_POST['nama_pasien'];
        $usia         = $_POST['usia'];
        $jk           = $_POST['jk'];
        $alamat       = $_POST['alamat'];
        $tgl_masuk    = $_POST['tgl_masuk'];
        $no_hp        = $_POST['no_hp'];
        $keluhan        =$_POST['keluhan'];
        $suhu           =$_POST['suhu'];
        $tensi          =$_POST['tensi'];
        $penjamin     = $_POST['penjamin'];
        $poli         = $_POST['poli'];
        $petugas      = $_POST['petugas'];
        $sql_update= "UPDATE tb_rekam_medis SET
                                            rm_lama     = '$rm_lama',
                                            no_bpjs     = '$no_bpjs',
                                            nama_pasien ='$nama_pasien',
                                            usia        ='$usia',
                                            jk          ='$jk',
                                            alamat      ='$alamat',
                                            tgl_masuk   ='$tgl_masuk',
                                            no_hp       ='$no_hp',
                                            keluhan     ='$keluhan',
                                            suhu        ='$suhu',
                                            tensi       ='$tensi',
                                            penjamin    ='$penjamin',
                                            poli        ='$poli',
                                            petugas  ='$petugas' WHERE id ='$id'";
      $result  = mysqli_query($conn,$sql_update);
      if ($_SESSION['akses'] == "admin")
      {
        header('location:login_admin.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "petugas")
      {
        header('location:login_petugas.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "dokter")
      {
        header('location:login_dokter.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "bidan")
      {
        header('location:login_bidan.php?id=#tampil');
      }
}
      //header('location : login_admin.php');
elseif (isset($_POST['delete_data']))
{
   $id           = $_GET['id'];
      $sql_delete= "DELETE FROM tb_rekam_medis WHERE id ='$id'";
      $result  = mysqli_query($conn,$sql_delete);
      if ($_SESSION['akses'] == "admin")
      {
        header('location:login_admin.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "petugas")
      {
        header('location:login_petugas.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "dokter")
      {
        header('location:login_dokter.php?id=#tampil');
      }
      elseif ($_SESSION['akses'] == "bidan")
      {
        header('location:login_bidan.php?id=#tampil');
      }
}
elseif (isset($_POST['kunjungan_baru'])) {
  $id           = $_GET['id'];

  $view = "SELECT * FROM tb_rekam_medis WHERE id = '$id'"; $run = mysqli_query($conn, $view);
  while ($row = $run->fetch_assoc()) {

  $rmlama       = $row['rm_lama'];
  $nobpjs       = $row['no_bpjs'];
  $nama         = $row['nama_pasien'];
  $usia         = $row['usia'];
  $jk           = $row['jk'];
  $alamat       = $row['alamat'];
  $tgl_masuk    = $_POST['tgl_masuk'];
  $telepon      = $row['no_hp'];
  $keluhan      =$_POST['keluhan'];
  $suhu         =$_POST['suhu'];
  $tensi        =$_POST['tensi'];
  $penjamin     = $_POST['penjamin'];
  $poli         = $_POST['poli'];
  $petugas      = $_POST['petugas'];

  $sql    = "INSERT INTO `tb_rekam_medis`(`id`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `keluhan`, `suhu`, `tensi`,
            `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES ('','$rmlama', '$nobpjs','$nama','$usia','$jk','$alamat','$tgl_masuk','$telepon','$keluhan','$suhu','$tensi','','',
              '$penjamin','$poli','$petugas','')";
  $result = mysqli_query($conn,$sql);}
  if ($_SESSION['akses'] == "admin")
  {
    header('location:login_admin.php?id=#tampil');
  }
  elseif ($_SESSION['akses'] == "petugas")
  {
    header('location:login_petugas.php?id=#tampil');
  }
  elseif ($_SESSION['akses'] == "dokter")
  {
    header('location:login_dokter.php?id=#tampil');
  }
  elseif ($_SESSION['akses'] == "bidan")
  {
    header('location:login_bidan.php?id=#tampil');
  }

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
            $result_user  = mysqli_query($conn, "SELECT nama FROM tb_petugas WHERE username = '$user'");
            while ($row = $result_user-> fetch_assoc()) {
           ?>
          <span class="btn btn-success"><marquee>Selamat Datang : <?php echo $row['nama'];} ?>  </marquee></span><br><br>
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
          <?php echo '<form>
          <li class="nav-item">
            <a class="btn btn-danger js-scroll-trigger" onClick="javascript:history.go(-1)">Kembali</a>
          </li>
          </form>';?>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
      <hr class="m-0">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="isidata">
        <div class="my-auto">
          <h2 class="mb-5">Data Lengkap  <span style="color:#35a82d" > Pasien </span></h2>
        <form class="" action="" method="post">
          <br>
          <?php
          $sql = "SELECT * FROM tb_rekam_medis WHERE id = '$id'";
          $result = mysqli_query($conn,$sql);

          while ($row = $result->fetch_assoc()) {
           ?>
           <form class="" action="" method="post">

          <table cellspacing="0" cellpadding="10">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <tr>
              <td>
                <label for="">RM-Lama</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" name="rm_lama" value="<?php echo $row['rm_lama']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">No BPJS</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="text" class="form-control" name="no_bpjs" value="<?php echo $row['no_bpjs']; ?>">
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
                <input type="text" class="form-control" name="nama_pasien" value="<?php echo $row['nama_pasien']; ?>">
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
                <input type="number" name="usia" class="form-control" value="<?php echo $row['usia']; ?>">
                <!-- <input type="text" class="form-control" name="usia" value="<?php echo $row['usia']; ?>"> -->
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
                <!-- <input type="text" class="form-control" name="jk" value="<?php echo $row['jk']; ?>"> -->
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
                <label for="">Alamat</label>
              </td>
              <td>
                :
              </td>
              <td>
                <!-- <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>"> -->
                <textarea name="alamat" rows="5" cols="80"><?php echo $row['alamat']; ?></textarea>
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
                <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $row['tgl_masuk']; ?>">
              </td>
            </tr>
            <tr>
              <td>
                <label for="">No HP</label>
              </td>
              <td>
                :
              </td>
              <td>
                <input type="number" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>">
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
                <input type="text" class="form-control" name="keluhan" value="<?php echo $row['keluhan']; ?>">
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
                <input type="text" class="form-control" name="suhu" value="<?php echo $row['suhu']; ?>">
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
                <input type="text" class="form-control" name="tensi" value="<?php echo $row['tensi']; ?>">
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
                <input type="text" class="form-control" name="tindakan" value="<?php echo $row['tindakan']; ?>" readonly>

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
                <input type="text" class="form-control" name="diagnosa" value="<?php echo $row['diagnosa']; ?>" readonly>
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
                <!-- <input type="text" class="form-control" name="penjamin" value="<?php echo $row['penjamin']; ?>"> -->
                <select class="form-control" name="penjamin">
                  <?php if ($row['penjamin'] == 'InHealth'): ?>
                    {
                      <option value="InHealth">InHealth</option>
                      <option value="BPJS">BPJS</option>
                      <option value="umum">Umum</option>
                    }
                    <?php elseif ($row['penjamin'] == 'BPJS'): ?> {
                      <option value="BPJS">BPJS</option>
                      <option value="Umum">Umum</option>
                      <option value="InHealth">InHealth</option>
                    }
                  <?php elseif ($row['penjamin'] == 'Umum'): ?> {
                      <option value="Umum">Umum</option>
                      <option value="InHealth">InHealth</option>
                      <option value="BPJS">BPJS</option>
                    }
                    <?php elseif ($row['penjamin'] == ''): ?> {
                      <option style="display:none" value="">Pilih Penjamin . . . </option>
                      <option value="Umum">Umum</option>
                      <option value="InHealth">InHealth</option>
                      <option value="BPJS">BPJS</option>

                    }: ?>
                  <?php endif ?>
                  </select>
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
              <select class="form-control" name="poli" data-placeholder="sads">
                  <?php if ($row['poli'] == 'Poli Umum'): ?>
                    {
                      <option value="Poli Umum">Poli Umum</option>
                      <option value="Poli Gigi">Poli Gigi</option>
                      <option value="Poli Kebidanan">Poli Kebidanan</option>
                    }
                  <?php elseif ($row['poli'] == 'Poli Gigi'): ?> {
                      <option value="Poli Gigi">Poli Gigi</option>
                      <option value="Poli Kebidanan">Poli Kebidanan</option>
                      <option value="Poli Umum">Poli Umum</option>
                    }
                  <?php elseif ($row['poli'] == 'Poli Kebidanan'): ?> {
                      <option value="Poli Kebidanan">Poli Kebidanan</option>
                      <option value="Poli Umum">Poli Umum</option>
                      <option value="Poli Gigi">Poli Gigi</option>
                    }
                    <?php elseif ($row['poli'] == ''): ?> {
                      <option style="display:none" value="">Pilih Poli . . . </option>
                      <option value="Poli Kebidanan">Poli Kebidanan</option>
                      <option value="Poli Umum">Poli Umum</option>
                      <option value="Poli Gigi">Poli Gigi</option>

                    }: ?>
                  <?php endif ?>
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
                <input type="text" class="form-control" name="petugas" value="<?php echo $row['petugas']; ?>" readonly>
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
                <input type="text" class="form-control" name="dokter" value="<?php echo $row['dokter']; ?>" readonly>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                <input type="submit" name="update_data" class="btn btn-warning" value="Update">
              </center>
              </td>
              <td>
                <center>
                <input type="submit" name="delete_data" class="btn btn-danger" value="Delete">
              </center>
              </td>
              <td>
                <center>
                <input type="submit" name="kunjungan_baru" class="btn btn-success" value="Kunjungan Baru">
              </center>

              </td>
            </tr>
          </table><?php } ?></form>
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
