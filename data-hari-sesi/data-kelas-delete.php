<?php
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$kode_kelas = $_GET['kode_kelas'];

$conn = open_connection();

$query = "DELETE FROM tb_kelas WHERE kode_kelas = '$kode_kelas'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-kelas/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_kelas : " . mysqli_error($conn);
}

?>