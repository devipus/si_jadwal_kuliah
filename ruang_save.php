<?php
	include "koneksi.php";
	$kode_ruang=$_POST['kode_ruang'];
	$nama_ruang = $_POST['nama_ruang'];
	$kapasitas = $_POST['kapasitas'];

	$sql_cek = mysqli_query($koneksi, "SELECT kode_ruang, nama_ruang FROM ruang WHERE kode_ruang='$kode_ruang' or nama_ruang = '$nama_ruang'");
	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='ruang.php'; </script>";
		# code...
	} else {

		mysqli_query($koneksi,"INSERT INTO ruang (kode_ruang, nama_ruang, kapasitas) VALUES ('$kode_ruang', '$nama_ruang', '$kapasitas')");
		header('location:ruang.php');}
?>