<?php
// Load file koneksi.php
include "koneksi.php";
session_start();

if ($_SESSION['akses'] ==  "petugas") {
  $link = "http://localhost:8080/pkn/login_petugas.php";
}
elseif ($_SESSION['akses'] ==  "admin") {
  $link = "http://localhost:8080/pkn/login_admin.php";
}
?>

<html>
<head>
    <title>Data Rekam Medis</title>
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>
<body>
    <h2>Data Rekam Medis</h2><hr>

    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="2">Per Bulan</option>
            <option val1ue="3">Per Tahun</option>
        </select>
        <br /><br/>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tgl_masuk) AS tahun FROM tb_rekam_medis GROUP BY YEAR(tgl_masuk)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit">Tampilkan</button>
        <a href="report.php">Reset Filter</a>
        <br><br>
        <a href="<?php echo $link; ?>" >Kembali</a>
    </form>
    <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
      $filter = $_GET['filter']; // Ambil data filder yang dipilih user

      if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Rekam Medis Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM tb_rekam_medis WHERE MONTH(tgl_masuk)='".$_GET['bulan']."' AND YEAR(tgl_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Rekam Medis Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM tb_rekam_medis WHERE YEAR(tgl_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Rekam Madis</b><br /><br />';
        echo '<a href="print.php">Cetak PDF</a><br /><br />';

        $query = "SELECT * FROM tb_rekam_medis ORDER BY tgl_masuk"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>

    <table border="1" cellpadding="8">
    <tr>
      <th>TANGGAL</th>
      <th>REKAM MEDIS</th>
      <th>Nama</th>
      <th>DIAGNOSA</th>
      <th>TINDAKAN</th>
      <th>POLI</th>
      <th>DOKTER</th>
    </tr>

    <?php
    $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-M-Y', strtotime($data['tgl_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy

            echo "<tr>";
            echo "<td>".$data['tgl_masuk']."</td>";
            echo "<td>".$data['rm_lama']."</td>";
            echo "<td>".$data['nama_pasien']."</td>";
            echo "<td>".$data['diagnosa']."</td>";
            echo "<td>".$data['tindakan']."</td>";
            echo "<td>".$data['poli']."</td>";
            echo "<td>".$data['dokter']."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>
    </table>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->
</body>
</html>
