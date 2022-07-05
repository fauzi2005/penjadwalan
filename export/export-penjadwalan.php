<?php 
require "../config/site-name.php";
require "../config/koneksi.php";
require "../config/functions.php";

check_login();

$conn = open_connection();

$query = ("SELECT tb_jadwal.kode_jadwal, tb_hari.nama_hari, tb_jadwal.kelas, tb_jadwal.kode_gmp, tb_jadwal.kode_sesi, tb_sesi.jam_mulai, tb_sesi.jam_selesai, tb_jurusan.nama_jurusan FROM tb_jadwal INNER JOIN tb_hari ON tb_jadwal.kode_hari = tb_hari.kode_hari, tb_sesi, tb_jurusan, tb_kelas WHERE tb_sesi.kode_sesi = tb_jadwal.kode_sesi AND tb_jadwal.kelas = tb_kelas.kode_kelas AND tb_kelas.jurusan = tb_jurusan.kode_jurusan ORDER BY tb_jadwal.kode_hari, tb_jadwal.kelas, tb_sesi.id ASC");

$dataPenjadwalan = mysqli_query($conn, $query);
$i = 1;


$filename = "Data Penjadwalan (" . date('d-m-Y') . ").xls";

// fungsi header dengan mengirimkan raw data excel
header("Content-Type: application/vnd.ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename=" . $filename);


?>

<!DOCTYPE html>
<html>
<head>
	<title>EXPORT</title>
</head>
<body style="border: 0.1pt solid #ccc">
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Hari</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Kode GMP</th>
				<th>Sesi</th>
				<th>Jam Mulai</th>
				<th>Jam Selesai</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataPenjadwalan as $penjadwalan) : ?>
				<?php
				if ($penjadwalan['kode_sesi'] == "rest1" || $penjadwalan['kode_sesi'] == "rest2") {
					$penjadwalan['kode_sesi'] = "Istirahat";
				}
				?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $penjadwalan['nama_hari']; ?></td>
					<td><?= $penjadwalan['kelas']; ?></td>
					<td><?= $penjadwalan['nama_jurusan']; ?></td>
					<td><?= $penjadwalan['kode_gmp']; ?></td>
					<td><?= $penjadwalan['kode_sesi']; ?></td>
					<td><?= $penjadwalan['jam_mulai']; ?></td>
					<td><?= $penjadwalan['jam_selesai']; ?></td>
				</tr>
				<?php 
				$i++;
				?>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>