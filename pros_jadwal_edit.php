<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$hari=$_POST['hari'];
	$jam = $_POST['jam'];
	$kode_mk = $_POST['kode_mk'];
	$nama_mk=$_POST['nama_mk'];
	$nama_dosen = $_POST['nama_dosen'];
	$prodi = $_POST['prodi'];
	$kelas = $_POST['kelas'];
	$ruang = $_POST['ruang'];
	$tahun_ajaran = $_POST['tahun_ajaran'];

	$jadwal=mysqli_query($koneksi,"UPDATE jadwal SET hari = '$hari', jam ='$jam', kode_mk = '$kode_mk', nama_mk = '$nama_mk'
	, nama_dosen = '$nama_dosen', prodi = '$prodi', kelas = '$kelas', ruang = '$ruang', tahun_ajaran = '$tahun_ajaran' WHERE id = '$id'");
	header('location:jadwal.php');
?>