<?php 
require "../config/site-name.php";
require "../config/koneksi.php";
require "../config/functions.php";

check_login();

$conn = open_connection();

$query = ("SELECT tb_guru_mapel.kode_gmp, tb_guru.nama_guru, tb_mapel.nama_mapel, tb_jurusan.nama_jurusan FROM tb_guru_mapel
	INNER JOIN tb_guru
	ON tb_guru_mapel.kode_guru = tb_guru.kode_guru
	INNER JOIN tb_mapel
	ON tb_guru_mapel.kode_mapel = tb_mapel.kode_mapel
	INNER JOIN tb_jurusan
	ON tb_guru_mapel.kode_jurusan_mapel = tb_jurusan.kode_jurusan");

$dataGuruMapel = mysqli_query($conn, $query);
$i = 1;


$filename = "Data Guru Mata Pelajaran (" . date('d-m-Y') . ").xls";

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
				<th>Kode GMP</th>
				<th>Nama Guru</th>
				<th>Mata Pelajaran</th>
				<th>Jurusan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataGuruMapel as $guruMapel) : ?>
				<tr>
					<td><?= $guruMapel["kode_gmp"]; ?></td>
					<td><?= $guruMapel["nama_guru"]; ?></td>
					<td><?= $guruMapel["nama_mapel"]; ?></td>
					<td><?= $guruMapel["nama_jurusan"]; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>