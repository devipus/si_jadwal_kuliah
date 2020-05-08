<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$kode_dosen=$_POST['kode_dosen'];
	$nama_dosen = $_POST['nama_dosen'];
	$nip = $_POST['nip'];
	$alamat=$_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$agama = $_POST['agama'];
	$pendidikan = $_POST['pendidikan'];

	$dosen=mysqli_query($koneksi,"UPDATE dosen SET kode_dosen = '$kode_dosen', nama_dosen = '$nama_dosen', nip = '$nip', alamat = '$alamat', tgl_lahir = '$tgl_lahir', 
			jenkel = '$jenkel', agama = '$agama', pendidikan = '$pendidikan' WHERE id = '$id'");
	header('location:dosen.php'); 
?>