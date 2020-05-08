<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$dosen=mysqli_query($koneksi,"DELETE FROM dosen WHERE id='$id'");
	header('location:dosen.php');
?>