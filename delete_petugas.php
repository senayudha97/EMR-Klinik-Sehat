<?php
include 'koneksi.php';

session_start();
  if ($_SESSION['akses'] !== "admin") {
      header('location:index.php?pesan=belumlogin');
    }    
 
 
 //if (isset($_GET['delete_petugas'])) {
//     $nama             =$_POST['nama_lengkap'];
//     $username         =$_POST['username'];
//     $password         =$_POST['password'];
//     $jk               =$_POST['jk'];
//     $lahir            =$_POST['lahir'];
//     $alamat           =$_POST['alamat'];
   $username  = $_GET['username'];
    $sql  = "DELETE FROM tb_petugas WHERE username='$username'";
    $result = mysqli_query($conn,$sql);


    $sql2  = "DELETE FROM tb_login WHERE username='$username'";
    $result2 = mysqli_query($conn,$sql2);

    if (!$result || !$result2) {
       printf("Errormessage: %s\n", $mysqli->error);
    }
    else {
      header('location:login_admin.php?id=#tampilpetugas');
  }
 # code...
 ?>