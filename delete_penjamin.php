<?php
include "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM `tb_penjamin` WHERE id = '$id'"; $result = mysqli_query($conn,$sql);

if ($result) {
  header('location:tampil_penjamin.php');
}

 ?>
