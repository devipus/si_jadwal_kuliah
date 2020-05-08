<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$jadwal=mysqli_query($koneksi,"DELETE FROM jadwal WHERE id='$id'");
	header('location:jadwal.php');
?>