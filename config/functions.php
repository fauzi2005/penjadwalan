<?php 
session_start();
define('BASE_URL', 'http://localhost/github-repository/php-project/php-project/');

function check_login(){
	if(!isset($_SESSION['username'])){
		header("Location:" . BASE_URL . "login/");
	}
}

function get_data_jurusan(){
	require_once "koneksi.php";
	$conn = open_connection();

	$queryJurusan = "SELECT kode_jurusan, nama_jurusan FROM tb_jurusan";
	$hasilJurusan = mysqli_query($conn, $queryJurusan);

	$listJurusan = array();
	while($rowJurusan = mysqli_fetch_assoc($hasilJurusan)){
		$listJurusan[ $rowJurusan['kode_jurusan'] ] = $rowJurusan['nama_jurusan'];
	}
	return $listJurusan;
}

function get_data_guru(){
	require_once "koneksi.php";
	$conn = open_connection();

	$queryGuru = "SELECT kode_guru, nama_guru FROM tb_guru";
	$hasilGuru = mysqli_query($conn, $queryGuru);

	$listGuru = array();
	while($rowGuru = mysqli_fetch_assoc($hasilGuru)){
		$listGuru[ $rowGuru['kode_guru'] ] = $rowGuru['nama_guru'];
	}
	return $listGuru;
}

function get_data_hari(){
	require_once "koneksi.php";
	$conn = open_connection();

	$queryHari = "SELECT kode_hari, nama_hari FROM tb_hari";
	$hasilHari = mysqli_query($conn, $queryHari);

	$listHari = array();
	while($rowHari = mysqli_fetch_assoc($hasilHari)){
		$listHari[ $rowHari['kode_hari'] ] = $rowHari['nama_hari'];
	}
	return $listHari;
}

?>

