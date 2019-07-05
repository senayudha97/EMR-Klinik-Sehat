<?php
include 'koneksi.php';

session_start();
  if ($_SESSION['akses'] !== "admin") {
      header('location:index.php?pesan=belumlogin');
    }
  if (isset($_POST['insert_rm'])){

    $rmlama         =$_POST['rm_lama'];
    $nobpjs         =$_POST['no_bpjs'];
    $nama           =$_POST['jeneng'];
    $usia           =$_POST['usia'];
    $jk             =$_POST['jk'];
    $alamat         =$_POST['alamat'];
    $tgl_masuk      =$_POST['tgl_masuk'];
    $telepon        =$_POST['telepon'];
    $keluhan        =$_POST['keluhan'];
    $suhu           =$_POST['suhu'];
    $tensi          =$_POST['tensi'];
    $penjamin       =$_POST['penjamin'];
    $poli           =$_POST['poli'];
    $petugas        =$_POST['petugas'];


    $sql    = "INSERT INTO `tb_rekam_medis`(`id`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `keluhan`, `suhu`, `tensi`,
              `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES ('','$rmlama', '$nobpjs','$nama','$usia','$jk','$alamat','$tgl_masuk','$telepon','$keluhan','$suhu','$tensi','','',
                '$penjamin','$poli','$petugas','')";
    $result = mysqli_query($conn,$sql);

    if (!$result) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampil');
    }
  }


  elseif (isset($_POST['insert_rm_petugas'])){

    $rmlama         =$_POST['rm_lama'];
    $nobpjs         =$_POST['no_bpjs'];
    $nama           =$_POST['jeneng'];
    $usia           =$_POST['usia'];
    $jk             =$_POST['jk'];
    $alamat         =$_POST['alamat'];
    $tgl_masuk      =$_POST['tgl_masuk'];
    $telepon        =$_POST['telepon'];
    $keluhan        =$_POST['keluhan'];
    $suhu           =$_POST['suhu'];
    $tensi          =$_POST['tensi'];
    $penjamin       =$_POST['penjamin'];
    $poli           =$_POST['poli'];
    $petugas        =$_POST['petugas'];


    $sql    = "INSERT INTO `tb_rekam_medis`(`id`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `keluhan`, `suhu`, `tensi`,
              `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES ('','$rmlama', '$nobpjs','$nama','$usia','$jk','$alamat','$tgl_masuk','$telepon','$keluhan','$suhu','$tensi','','',
                '$penjamin','$poli','$petugas','')";
    $result = mysqli_query($conn,$sql);

    if (!$result) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampil');
    }
  }

   elseif (isset($_POST['insert_petugas'])) {
    $nama             =$_POST['nama_lengkap'];
    $username         =$_POST['username'];
    $password         =$_POST['password'];
    $jk               =$_POST['jk'];
    $lahir            =$_POST['lahir'];
    $alamat           =$_POST['alamat'];

    $sql  = "INSERT INTO `tb_petugas`(`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`)
            VALUES ('','$nama','$username','$password','$jk','$lahir','$alamat')";
    $result= mysqli_query($conn,$sql);


    $sql2 = "INSERT INTO `tb_login`(`id`, `nama`, `username`, `password`, `akses`)
            VALUES ('','$nama','$username','$password','petugas')";
    $result2 = mysqli_query($conn,$sql2);

    if (!$result || !$result2) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampilpetugas');
    }

  }

  elseif (isset($_POST['insert_dokter'])) {
    $nama             =$_POST['nama_lengkap'];
    $username         =$_POST['username'];
    $password         =$_POST['password'];
    $jk               =$_POST['jk'];
    $lahir            =$_POST['lahir'];
    $alamat           =$_POST['alamat'];

    $sql  = "INSERT INTO `tb_dokter`(`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`)
            VALUES ('','$nama','$username','$password','$jk','$lahir','$alamat')";
    $result= mysqli_query($conn,$sql);


    $sql2 = "INSERT INTO `tb_login`(`id`, `nama`, `username`, `password`, `akses`)
            VALUES ('','$nama','$username','$password','dokter')";
    $result2 = mysqli_query($conn,$sql2);

    if (!$result || !$result2) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampildokter');
    }

  }

  elseif (isset($_POST['insert_bidan'])) {
    $nama             =$_POST['nama_lengkap'];
    $username         =$_POST['username'];
    $password         =$_POST['password'];
    $jk               =$_POST['jk'];
    $lahir            =$_POST['lahir'];
    $alamat           =$_POST['alamat'];

    $sql  = "INSERT INTO `tb_bidan`(`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`)
            VALUES ('','$nama','$username','$password','$jk','$lahir','$alamat')";
    $result= mysqli_query($conn,$sql);


    $sql2 = "INSERT INTO `tb_login`(`id`, `nama`, `username`, `password`, `akses`)
            VALUES ('','$nama','$username','$password','bidan')";
    $result2 = mysqli_query($conn,$sql2);

    if (!$result || !$result2) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampilbidan');
    }
  }
  elseif (isset($_POST['kirim_penjamin_admin'])) {
    $penjamin = $_POST['penjamin'];
    $sql    =  "INSERT INTO tb_penjamin (`id`, `penjamin`) VALUES ('', '$penjamin')";
    $result =  mysqli_query($conn, $sql);

    if (!$result) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:tampil_penjamin_admin.php');
    }
  }
  elseif (isset($_POST['kirim_penjamin_petugas'])) {
    $penjamin = $_POST['penjamin'];
    $sql    =  "INSERT INTO tb_penjamin (`id`, `penjamin`) VALUES ('', '$penjamin')";
    $result =  mysqli_query($conn, $sql);

    if (!$result) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:tampil_penjamin_petugas.php');
    }
  }

 ?>
