<?php
include 'koneksi.php';

session_start();
  if ($_SESSION['akses'] !== "petugas") {
      header('location:index.php?pesan=belumlogin');
    }
  if (isset($_POST['insert_rm'])){

    //$rmbaru         =$_POST['rmbaru'];
    $rmlama         =$_POST['rm_lama'];
    $nobpjs         =$_POST['no_bpjs'];
    $nama           =$_POST['jeneng'];
    $usia           =$_POST['usia'];
    $jk             =$_POST['jk'];
    $alamat         =$_POST['alamat'];
    $tgl_masuk      =$_POST['tgl_masuk'];
    $telepon        =$_POST['no_hp'];
    $keluhan        =$_POST['keluhan'];
    $suhu           =$_POST['suhu'];
    $tensi          =$_POST['tensi'];
    $tindakan       =$_POST['tindakan'];
    $diagnosa       =$_POST['diagnosa'];
    $penjamin       =$_POST['penjamin'];
    $poli           =$_POST['poli'];
    $petugas        =$_POST['petugas'];
    $dokter         =$_POST['dokter'];


    $sql    = "INSERT INTO `tb_rekam_medis`(`id`,`rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`,
       `keluhan`, `suhu`, `tensi`, `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`)
              VALUES ('','$rmlama', '$nobpjs','$nama','$usia','$jk','$alamat',
              '$tgl_masuk','$telepon','$keluhan','$suhu','$tensi','$tindakan','$diagnosa','$penjamin','$poli','$petugas','$dokter')";
    $result =mysqli_query($conn,$sql);

    if (!$result) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_petugas.php?id=#tampil');
    }
  }
 ?>
