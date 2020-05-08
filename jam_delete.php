<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$jam=mysqli_query($koneksi,"DELETE FROM jam WHERE id='$id'");
	header('location:jam.php');
?>