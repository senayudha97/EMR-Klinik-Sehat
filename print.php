<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			/* table-layout:fixed;width: 770px; //ukuran Landscape */
			table-layout:fixed;width: 535px; //ukuran potrait
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
		table th {
			text-align:center;
		}
	</style>
</head>
<body>
	<h3>KLINIK SEHAT</h3>
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user
		if($filter == '1'){ // Jika filter nya 1 (per tanggal)

			$tgl = date('d-m-y', strtotime($_GET['tanggal']));

			echo '<b>Data Rekam Medis Tanggal '.$tgl.'</b><br /><br />';

			$query = "SELECT * FROM tb_rekam_medis WHERE DATE(tgl_masuk)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			echo '<b>Data Rekam Medis Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM tb_rekam_medis WHERE MONTH(tgl_masuk)='".$_GET['bulan']."' AND YEAR(tgl_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
		}else{ // Jika filter nya 3 (per tahun)
			echo '<b>Data Rekam Medis Tahun '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM tb_rekam_medis WHERE YEAR(tgl_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
		}
	}else{ // Jika user tidak memilih filter
		echo '<b>Semua Data Rekam Medis</b><br /><br />';

		$query = "SELECT * FROM tb_rekam_medis ORDER BY tgl_masuk"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
	}
	?>
	<table border="1" cellpadding="8">
		<tr>
      <th>TANGGAL</th>
      <th>REKAM MEDIS</th>
      <th>NAMA</th>
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
						$tgl = date('d-m-Y', strtotime($data['tgl_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy

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
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Rekam Medis.pdf', 'D');
?>
