<?php
	include "koneksi.php";
	$prodi=$_POST['prodi'];
	$semester = $_POST['semester'];
	$kode_mk = $_POST['kode_mk'];
	$nama_mk=$_POST['nama_mk'];
	$jml_jam = $_POST['jml_jam'];

	$sql_cek = mysqli_query($koneksi, "SELECT kode_mk, nama_mk FROM matkul WHERE kode_mk='$kode_mk' or nama_mk = '$nama_mk'");
	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='matkul.php'; </script>";
		# code...
	} else {

	mysqli_query($koneksi,"INSERT INTO matkul (prodi, semester, kode_mk, nama_mk, jml_jam) VALUES ('$prodi', '$semester', '$kode_mk', '$nama_mk', '$jml_jam')");
	header('location:matkul.php');
?>