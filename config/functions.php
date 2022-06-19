<?php 
// session_start();
define('BASE_URL', 'http://localhost/github-repository/php-project/php-project/');


function get_data_jurusan(){
	require_once "koneksi.php";
	$conn = open_connection();

	$query = "SELECT kode_jurusan, nama_jurusan FROM tb_jurusan";
	$hasil = mysqli_query($conn, $query);

	$list = array();
	while($row = mysqli_fetch_assoc($hasil)){
		$list[ $row['kode_jurusan'] ] = $row['nama_jurusan'];
	}
	return $list;
}


?>