<?php
session_start();
require "../config/functions.php";
require "../config/koneksi.php";

$kode_guru = $_POST['kode_guru'];

$conn = open_connection();

$query = "DELETE FROM tb_guru WHERE kode_guru = '$kode_guru'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-guru/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_guru : " . mysqli_error($conn);
}

?>