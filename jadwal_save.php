
<?php
	include "koneksi.php";
	$hari=$_POST['hari'];
	$jam = $_POST['jam'];
	$kode_mk = $_POST['kode_mk'];
	$nama_mk=$_POST['nama_mk'];
	$nama_dosen = $_POST['nama_dosen'];
	$prodi = $_POST['prodi'];
	$kelas = $_POST['kelas'];
	$ruang = $_POST['ruang'];
	$tahun_ajaran = $_POST['tahun_ajaran'];


	// untuk mendapatkan data barang
	$query_jam ="SELECT * FROM jam WHERE jam = '$jam'";
	$result_jam = mysqli_query($koneksi, $query_jam);

	// untuk mendapatkan data kode matkul
	$query_kodemk ="SELECT * FROM matkul WHERE kode_mk = '$kode_mk'";
	$result_kodemk = mysqli_query($koneksi, $query_kodemk);

	// untuk mendapatkan data nama dosen
	$query_nmDosen ="SELECT * FROM dosen WHERE nama_dosen = '$nama_dosen'";
	$result_nmDosen = mysqli_query($koneksi, $query_nmDosen);

	// untuk mendapatkan data kelas
	$query_kdKelas ="SELECT * FROM kelas WHERE kode_kls = '$kelas'";
	$result_kdKelas = mysqli_query($koneksi, $query_kdKelas);

	// untuk mendapatkan data ruang
	$query_kdRuang ="SELECT * FROM ruang WHERE kode_ruang = '$ruang'";
	$result_kdRuang = mysqli_query($koneksi, $query_kdRuang);

	$sql_cek = mysqli_query($koneksi, "SELECT hari, jam, nama_dosen FROM jadwal WHERE hari='$hari' and jam = '$jam' and nama_dosen = '$nama_dosen'");
	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script> alert('Data Sudah Ada'); window.location='jadwal.php'; </script>";
		# code...
	} else {

		mysqli_query($koneksi,"INSERT INTO  jadwal (hari, jam, kode_mk, nama_mk, nama_dosen, prodi, kelas, ruang, tahun_ajaran) 
			VALUES ('$hari', '$jam', '$kode_mk', '$nama_mk', '$nama_dosen', '$prodi', '$kelas', '$ruang', '$tahun_ajaran')");
		header('location:jadwal.php'); 
	}
?>