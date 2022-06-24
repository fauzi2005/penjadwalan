<?php
require "../config/functions.php";
require "../config/koneksi.php";

check_login();

$kode_jurusan = $_POST['kode_jurusan'];

$conn = open_connection();

$query = "DELETE FROM tb_jurusan WHERE kode_jurusan = '$kode_jurusan'";

$result = mysqli_query($conn, $query);

if ($result) {
	$url = BASE_URL . 'data-jurusan/';
	$_SESSION['sessionAlert'] = "Data berhasil dihapus !!";
	header("Location: $url");
} else {
	echo "Gagal menghapus data $kode_jurusan : " . mysqli_error($conn);
}

?>