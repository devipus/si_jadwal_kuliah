<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$ruang=mysqli_query($koneksi,"DELETE FROM ruang WHERE id='$id'");
	header('location:ruang.php');
?>