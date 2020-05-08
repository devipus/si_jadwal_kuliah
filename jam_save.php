<?php
	include "koneksi.php";
	$kode_jam=$_POST['kode_jam'];
	$jam = $_POST['jam'];

	$sql_cek = mysqli_query($koneksi, "SELECT kode_jam, jam  FROM jam WHERE kode_jam='$kode_jam' or jam = '$jam'");

	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='jam.php'; </script>";
		# code...
	} else {

		mysqli_query($koneksi,"INSERT INTO jam (kode_jam, jam) VALUES ('$kode_jam','$jam')");
		header('location:jam.php'); }
?>