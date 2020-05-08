<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$kode_ruang=$_POST['kode_ruang'];
	$nama_ruang = $_POST['nama_ruang'];
	$kapasitas = $_POST['kapasitas'];

	$ruang=mysqli_query($koneksi,"UPDATE ruang SET kode_ruang = '$kode_ruang', nama_ruang = '$nama_ruang', kapasitas = '$kapasitas' WHERE id = '$id'");
	header('location:ruang.php');
?>