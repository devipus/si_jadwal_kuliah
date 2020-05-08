
<?php
	include "koneksi.php";
	$kode_dosen=$_POST['kode_dosen'];
	$nama_dosen = $_POST['nama_dosen'];
	$nip = $_POST['nip'];
	$alamat=$_POST['alamat'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$agama = $_POST['agama'];
	$pendidikan = $_POST['pendidikan'];

	$sql_cek = mysqli_query($koneksi, "SELECT kode_dosen, nip FROM dosen WHERE kode_dosen='$kode_dosen' or nip = '$nip'");
	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='dosen.php'; </script>";
		# code...
	} else {

		mysqli_query($koneksi,"INSERT INTO dosen (kode_dosen, nama_dosen, nip, alamat, tgl_lahir, jenkel, agama, pendidikan) VALUES ('$kode_dosen','$nama_dosen', '$nip', '$alamat', '$tgl_lahir', '$jenkel', '$agama', '$pendidikan')");
		header('location:dosen.php'); }
	
?>