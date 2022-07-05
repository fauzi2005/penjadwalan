<?php
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$kode_jadwal = $_POST['kode_jadwal'];

$conn = open_connection();

$query = "DELETE FROM tb_jadwal WHERE kode_jadwal = '$kode_jadwal'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-penjadwalan/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_gmp : " . mysqli_error($conn);
}

?>