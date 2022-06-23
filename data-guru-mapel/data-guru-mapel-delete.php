<?php
session_start();
require "../config/functions.php";
require "../config/koneksi.php";

$kode_gmp = $_POST['kode_gmp'];

$conn = open_connection();

$query = "DELETE FROM tb_guru_mapel WHERE kode_gmp = '$kode_gmp'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-guru-mapel/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_gmp : " . mysqli_error($conn);
}

?>