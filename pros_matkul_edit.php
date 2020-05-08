<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$prodi=$_POST['prodi'];
	$semester = $_POST['semester'];
	$kode_mk = $_POST['kode_mk'];
	$nama_mk=$_POST['nama_mk'];
	$jml_jam = $_POST['jml_jam'];

	$dosen=mysqli_query($koneksi,"UPDATE matkul SET prodi = '$prodi', semester = '$semester', kode_mk = '$kode_mk', nama_mk = '$nama_mk', jml_jam = '$jml_jam' WHERE id = '$id'");
	header('location:matkul.php');
?>