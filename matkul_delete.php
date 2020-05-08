<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$matkul=mysqli_query($koneksi,"DELETE FROM matkul WHERE id='$id'");
	header('location:matkul.php');
?>