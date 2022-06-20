<?php
session_start();
require "../config/functions.php";
require "../config/koneksi.php";

$kode_mapel = $_GET['kode_mapel'];

$conn = open_connection();

$query = "DELETE FROM tb_mapel WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-mapel/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_mapel : " . mysqli_error($conn);
}

?>