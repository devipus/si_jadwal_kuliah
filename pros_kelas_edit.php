<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$kode_kls=$_POST['kode_kls'];
	$jml_mhs = $_POST['jml_mhs'];

	$dosen=mysqli_query($koneksi,"UPDATE kelas SET kode_kls = '$kode_kls', jml_mhs = '$jml_mhs' WHERE id = '$id'");
	header('location:kelas.php');
?>