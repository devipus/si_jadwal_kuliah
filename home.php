<?php
  include('topmenu.php');
  include('sidebar_menu.php');
  include('koneksi.php')
?>

<?php
  error_reporting(0);
  //membuat route
  switch ($_GET['page']) {
    
    default:
      include "dashboard.php";
      break;

    case "data_dosen":
      include "dosen.php";
      break;

    case "data_kelas":
      include "kelas.php";
      break;

    case "data_ruang":
      include "ruang.php";
      break;

    case "data_jam":
      include "jam.php";
      break;

    case "data_matkul":
      include "matkul.php";
      break;

    case "data_jadwal":
      include "jadwal.php";
      break;
  }
?>

<?php
  include 'footer.php';
?>



 

