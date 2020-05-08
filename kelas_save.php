<?php
	include "koneksi.php";
	$kode_kls=$_POST['kode_kls'];
	$jml_mhs = $_POST['jml_mhs'];

	$sql_cek = mysqli_query($koneksi, "SELECT kode_kls  FROM kelas WHERE kode_kls='$kode_kls'");

	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='kelas.php'; </script>";
		# code...
	} else {

	mysqli_query($koneksi,"INSERT INTO kelas (kode_kls, jml_mhs) VALUES ('$kode_kls','$jml_mhs')");
	header('location:kelas.php'); }
?>