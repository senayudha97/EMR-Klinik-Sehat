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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box;}

  /* Button used to open the contact form - fixed at the bottom of the page */
  .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
  }

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
</style>

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
            <a class="nav-link js-scroll-trigger" href="#tampil">Tampil Data Rekam Medis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#isidata">Isi Data Rekam Medis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tambahpetugas">Tambah Petugas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tampilpetugas">Tampil Petugas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tambahdokter">Tambah Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tampildokter">Tampil Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tambahbidan">Tambah Bidan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#tampilbidan">Tampil Bidan</a>
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
        <form class="" action="admin_cari.php" method="post">
          <table border="0" cellpadding="10">
            <tr>
              <td>
                <label for="" style="color:#35a82d;"><b>Cari Data RM-Lama</b></label>
              </td>
              <td>:</td>
              <td>
                <input type="text" name="rmlama" class="form-control" value="">
              </td>
              <td>
                <input type="submit" class="btn btn-success" name="cari_rm_lama" value="Cari">
              </td>
            </tr>
            <tr>
              <td>
                <label for="" style="color:#35a82d;"><b>Cari Data Nama</b></label>
              </td>
              <td>:</td>
              <td>
                <input type="text" name="nama" class="form-control" value="">
              </td>
              <td>
                <input type="submit" class="btn btn-success" name="cari_nama" value="Cari">
              </td>
            </tr>
          </tr>
          <tr>
            <td>
              <label for="" style="color:#35a82d;"><b>Cari Data No BPJS</b></label>
            </td>
            <td>:</td>
            <td>
              <input type="text" name="bpjs" class="form-control" value="">
            </td>
            <td>
              <input type="submit" class="btn btn-success" name="cari_bpjs" value="Cari">
            </td>
          </tr>
            </form>
          </table>
          <br>
          <table border="1" cellspacing="0" cellpadding="13">
            <thead class="bg-dark">
            <th>Rekam Medis</th>
            <th>No BPJS</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Tindakan</th>
            <th>Poli</th>
            <th>Petugas</th>
            <th>Dokter / Bidan</th>
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
                <td><?php echo $row['diagnosa']; ?></td>
                <td><?php echo $row['tindakan']; ?></td>
                <td><?php echo $row['poli']; ?></td>
                <td><?php echo $row['petugas']; ?></td>
                <td><?php echo $row['dokter']; ?></td>
                <td>
                  <a href="tampil_lengkap.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">More</a>
                </td>
            </tr>
                <?php } ?>
            <tr>
              <td <td colspan="9">

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
              <td colspan="9">
                <a href="report.php">Cetak Report PDF</a>
              </td>
            </tr>
          </table>
        </div>
      </section>

      <form name="u" class="" action="insert.php" method="POST">
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="isidata">
          <div class="my-auto">
            <h2 class="mb-0">Form isi
              <span style="color:#35a82d" >Rekam Medis</span>
            </h2>
            <br>
            <table  cellspacing="0" cellpadding="10">
              <tr>
                <td>
                  <label for="">Rekam Medis</label>
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
                  <label for="">Nomor BPJS</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="no_bpjs" class="form-control" >
                </td>
                <td>
                  <input type="button" class="btn btn-default" value="Umum" onclick=umum(); >
                  <script>
                  function umum() {
                    u.no_bpjs.value="Umum"
                  }
                  </script>
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
                  <input type="date" name="tgl_masuk" class="form-control" >
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
                  <label for="">Keluhan</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="keluhan" class="form-control" >
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
                  <input type="text" name="suhu" class="form-control" >
                </td>
              </tr><tr>
                <td>
                  <label for="">Tensi</label>
                </td>
                <td>
                  :
                </td>
                <td>
                  <input type="text" name="tensi" class="form-control" >
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
                  <select class="form-control" name="petugas">
                    <option value="" selected>Pilih Penjamin</option>
                    <?php
                    $sql_petugas = "SELECT penjamin FROM tb_penjamin";
                    $result_petugas  = mysqli_query($conn, $sql_petugas);
                    while ($row = $result_petugas->fetch_assoc()) { ?>
                      <option value="<?php echo $row['penjamin']; ?>"> <?php echo $row['penjamin']; ?> </option>
                    <?php } ?>
                </td>
                <td>
                <a href="tampil_penjamin.php" class="btn btn-success">+ Penjamin</a>
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
                  <option value="Poli Umum">Poli Umum</option>
                  <option value="Poli Gigi">Poli Gigi</option>
                  <option value="Poli Kebidanan">Poli Kebidanan</option>
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
                    <option value="" selected>Pilih Petugas</option>
                    <?php
                    $sql_petugas = "SELECT nama FROM tb_petugas";
                    $result_petugas  = mysqli_query($conn, $sql_petugas);
                    while ($row = $result_petugas->fetch_assoc()) { ?>
                      <option value="<?php echo $row['nama']; ?>"> <?php echo $row['nama']; ?> </option>
                    <?php } ?>
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
        </section>


    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tambahpetugas">
      <div class="my-auto">
        <h2 class="mb-5">Tambah <span style="color:#35a82d" >Petugas</span></h2>
        <form class="" action="insert.php" method="post">
        <table  cellspacing="0" cellpadding="10">
          <tr>
            <td>
              <label for="">Nama Lengkap</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="nama_lengkap" class="form-control" >
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
              <input type="text" name="username" class="form-control" >
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
              <input type="text" name="password" class="form-control" >
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
              <input type="radio" name="jk" value="L">Laki-Laki
              <input type="radio" name="jk" value="P">Perempuan
            </td>
          </tr>
          <tr>
            <td>
              <label for="">Tanggal Lahir</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="date" name="lahir" class="form-control" >
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
            <td colspan="3"><center>
              <input type="submit" class="btn btn-success" name="insert_petugas" value="Kirim">
            </center>
            </td>
          </tr>
        </table>
        </form>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampilpetugas">
      <div class="my-auto">
        <h2>Tampil <span style="color:#35a82d" >Petugas</span></h2>
        <table border="1" cellpadding="13" cellspacing="0">
          <thead class="bg-dark">
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Password</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Edit</th>
          <th>Delete</th></thead>
          <?php
          $tampil_petugas = "SELECT * FROM tb_petugas"; $result_petugas = mysqli_query($conn,$tampil_petugas);
          while ($row = mysqli_fetch_assoc($result_petugas)) {?>
          <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
              <a href="edit_petugas.php?username=<?php echo $row['username']; ?>" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <a href="delete_petugas.php?username=<?php echo $row['username']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tambahdokter">
      <div class="my-auto">
        <h2 class="mb-5">Tambah <span style="color:#35a82d" >Dokter</span></h2>
        <form class="" action="insert.php" method="post">
        <table  cellspacing="0" cellpadding="10">
          <tr>
            <td>
              <label for="">Nama Lengkap</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="nama_lengkap" class="form-control" >
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
              <input type="text" name="username" class="form-control" >
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
              <input type="text" name="password" class="form-control" >
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
              <input type="radio" name="jk" value="L">Laki-Laki
              <input type="radio" name="jk" value="P">Perempuan
            </td>
          </tr>
          <tr>
            <td>
              <label for="">Tanggal Lahir</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="date" name="lahir" class="form-control" >
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
            <td colspan="3"><center>
              <input type="submit" class="btn btn-success" name="insert_dokter" value="Kirim">
            </center>
            </td>
          </tr>
        </table>
      </div>
      </form>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampildokter">
      <div class="my-auto">
        <h2>Tampil <span style="color:#35a82d" >Dokter</span></h2>
        <table border="1" cellpadding="13" cellspacing="0">
          <thead class="bg-dark">
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Password</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Edit</th>
          <th>Delete</th></thead>
          <?php
          $tampil_petugas = "SELECT * FROM tb_dokter"; $result_petugas = mysqli_query($conn,$tampil_petugas);
          while ($row = mysqli_fetch_assoc($result_petugas)) {?>
          <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
              <a href="edit_dokter.php?username=<?php echo $row['username']; ?>" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <a href="delete_dokter.php?username=<?php echo $row['username']; ?>"class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tambahbidan">
      <div class="my-auto">
        <h2 class="mb-5">Tambah <span style="color:#35a82d" >Bidan</span></h2>
        <form class="" action="insert.php" method="post">
        <table  cellspacing="0" cellpadding="10">
          <tr>
            <td>
              <label for="">Nama Lengkap</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="text" name="nama_lengkap" class="form-control" >
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
              <input type="text" name="username" class="form-control" >
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
              <input type="text" name="password" class="form-control" >
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
              <input type="radio" name="jk" value="L">Laki-Laki
              <input type="radio" name="jk" value="P">Perempuan
            </td>
          </tr>
          <tr>
            <td>
              <label for="">Tanggal Lahir</label>
            </td>
            <td>
              :
            </td>
            <td>
              <input type="date" name="lahir" class="form-control" >
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
            <td colspan="3"><center>
              <input type="submit" class="btn btn-success" name="insert_bidan" value="Kirim">
            </center>
            </td>
          </tr>
        </table>
        </form>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tampilbidan">
      <div class="my-auto">
        <h2>Tampil <span style="color:#35a82d" >Bidan</span></h2>
        <table border="1" cellpadding="13" cellspacing="0">
          <thead class="bg-dark">
          <th>Nama Lengkap</th>
          <th>Username</th>
          <th>Password</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Edit</th>
          <th>Delete</th></thead>
          <?php
          $tampil_bidan = "SELECT * FROM tb_bidan"; $result_bidan = mysqli_query($conn,$tampil_bidan);
          while ($row = mysqli_fetch_assoc($result_bidan)) {?>
          <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
              <a href="edit_bidan.php?username=<?php echo $row['username']; ?>" class="btn btn-warning">Edit</a>
            </td>
            <td>
              <a href="delete_bidan.php?username=<?php echo $row['username']; ?>"class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php }?>
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
