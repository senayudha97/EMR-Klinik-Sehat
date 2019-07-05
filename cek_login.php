<?php
session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql      = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
$login    = mysqli_query($conn,$sql);
$cek      = mysqli_num_rows($login);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($login);

  if ($data['akses'] == 'admin') {
    $_SESSION['username'] = $username;
    $_SESSION['akses']  = "admin";
    header("location:login_admin.php");
  }elseif ($data['akses'] == 'petugas') {
    $_SESSION['username'] = $username;
    $_SESSION['akses']  = "petugas";
    header("location:login_petugas.php");
  }elseif ($data['akses'] == 'dokter') {
    $_SESSION['username'] = $username;
    $_SESSION['akses']  = "dokter";
    header("location:login_dokter.php");
  }elseif ($data['akses'] == 'bidan') {
    $_SESSION['username'] = $username;
    $_SESSION['akses']  = "bidan";
    header("location:login_bidan.php");
  }else {
    header("location:index.php?pesan=gagal");
  }
}else {
  header("location:index.php?pesan=gagal");
}

 ?>
