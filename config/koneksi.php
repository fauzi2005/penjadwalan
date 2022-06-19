<?php 
// Membuka koneksi ke database kita
function open_connection()
{
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "db_penjadwalan";

	$koneksi = mysqli_connect($host, $username, $password, $database);

		// Periksa koneksi
	if (mysqli_connect_errno())
	{
		die ("Gagal melakukan koneksi ke MySQL : " . mysqli_connect_error());
	}

	return $koneksi;
}
?>