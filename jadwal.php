<!doctype html>
<html lang="en">
<head>
    <title>Data Jadwal Kuliah</title>
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/DataTables/datatables.min.css" rel="stylesheet">

    <script src="asset/js/jquery-1.10.2.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/DataTables/datatables.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    
</head>
<body>
 
    <div class="container">
        <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a></p>      

        <table id="mytable" class="table table-bordered">
            <thead>
              <th>No</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Kode Mata Kuliah</th>
              <th>Mata Kuliah</th>
              <th>Nama Dosen</th>
              <th>Prodi</th>
              <th>Kelas</th>
              <th>Ruang</th>
              <th>Tahun Ajaran</th>
              <th>Action</th>
            </thead>

            <?php 
              
              include "koneksi.php";

              // perintah query untuk ambil data barang
              $query_jam = 'SELECT * FROM jam';
              $res_jam = mysqli_query($koneksi, $query_jam);

              // perintah query untuk ambil data kode matkul
              $query_kodemk = 'SELECT * FROM matkul';
              $res_kodemk = mysqli_query($koneksi, $query_kodemk);

              // perintah query untuk ambil data nama dosen
              $query_nmDosen = 'SELECT * FROM dosen';
              $res_nmDosen = mysqli_query($koneksi, $query_nmDosen);

              // perintah query untuk ambil data kelas
              $query_kdKelas = 'SELECT * FROM kelas';
              $res_kdKelas = mysqli_query($koneksi, $query_kdKelas);

              // perintah query untuk ambil data ruang
              $query_kdRuang = 'SELECT * FROM ruang';
              $res_kdRuang = mysqli_query($koneksi, $query_kdRuang);

              //menampilkan data mysqli
              $no = 0;
              $jadwal=mysqli_query($koneksi,"SELECT * FROM jadwal");
              while($r=mysqli_fetch_array($jadwal)){
              $no++;
               
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $r['hari']; ?></td>
                <td><?php echo  $r['jam']; ?></td>
                <td><?php echo  $r['kode_mk']; ?></td>
                <td><?php echo  $r['nama_mk']; ?></td>
                <td><?php echo  $r['nama_dosen']; ?></td>
                <td><?php echo  $r['prodi']; ?></td>
                <td><?php echo  $r['kelas']; ?></td>
                <td><?php echo  $r['ruang']; ?></td>
                <td><?php echo  $r['tahun_ajaran']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
                   <a href="#" onclick="confirm_modal('jadwal_delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a>
                </td>
            </tr>
         
            <?php } ?>
        </table>
    </div>

    <!-- Modal Popup untuk Add--> 
    <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Data Jadwal Kuliah</h4>
            </div>

            <div class="modal-body">
              <form action="jadwal_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Hari">Hari</label>
                      <select name="hari" class="form-control">
                          <option value="">-- Pilih --</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                          <option value="Minggu">Minggu</option>
                         
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Jam">Jam</label>
                         <select name="jam" class="form-control">
                              <option value="">-- Pilih --</option>
                              <?php while ($jam = mysqli_fetch_array($res_jam)) {?>
                                  <option value="<?php echo $jam["jam"] ?>">
                                      <?php  echo $jam["jam"] ?>
                                  </option>
                              <?php } ?>
                          </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kode Mk">Kode Mata Kuliah</label>
                      <select name="kode_mk" class="form-control">
                              <option value="">-- Pilih --</option>
                              <?php while ($kode_mk = mysqli_fetch_array($res_kodemk)) {?>
                                  <option value="<?php echo $kode_mk["kode_mk"] ?>">
                                      <?php  echo $kode_mk["kode_mk"] ?>
                                  </option>
                              <?php } ?>
                          </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Nama Mk">Mata Kuliah</label>
                      <input type="text" name="nama_mk"  class="form-control" placeholder="Nama Mata Kuliah" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Nama Dosen">Nama Dosen</label>
                      <select name="nama_dosen" class="form-control" >
                            <option value="">-- Pilih --</option>
                            <?php while ($nama_dosen = mysqli_fetch_array($res_nmDosen)) {?>
                              <option value="<?php echo $nama_dosen["nama_dosen"] ?>">
                                  <?php  echo $nama_dosen["nama_dosen"] ?>
                              </option>
                    
                            <?php } ?>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Prodi">Prodi</label>
                      <select name="prodi" class="form-control">
                          <option value="">-- Pilih --</option>
                          <option value="D3">D3</option>
                          <option value="D4">D4</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kelas">Kelas</label>
                      <select name="kelas" class="form-control">
                            <option value="">-- Pilih --</option>
                            <?php while ($kode_kls = mysqli_fetch_array($res_kdKelas)) {?>
                              <option value="<?php echo $kode_kls["kode_kls"] ?>">
                                  <?php  echo $kode_kls["kode_kls"] ?>
                              </option>
                            <?php } ?>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Ruang">Ruang</label>
                      <select name="ruang" class="form-control">
                            <option value="">-- Pilih --</option>
                            <?php while ($kode_ruang = mysqli_fetch_array($res_kdRuang)) {?>
                              <option value="<?php echo $kode_ruang["kode_ruang"] ?>">
                                  <?php  echo $kode_ruang["kode_ruang"] ?>
                              </option>
                            <?php } ?>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Tahun ajaran">Tahun Ajaran</label>
                      <input type="text" name="tahun_ajaran"  class="form-control" plcaceholder="Tahun Ajaran" required/>
                    </div>

                  <div class="modal-footer">
                      <button class="btn btn-success" type="submit">
                          Confirm
                      </button>

                      <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Cancel
                      </button>
                  </div>

                  </form>

               

                </div>

               
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk Edit--> 
    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

    <!-- Modal Popup untuk delete--> 
    <div class="modal fade" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
          </div>
                    
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>



<!-- Javascript untuk popup modal Edit-->

    <script type="text/javascript">
       $(document).ready(function () {
       $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
    		   $.ajax({
        			   url: "jadwal_edit.php",
        			   type: "GET",
        			   data : {id: m,},
        			   success: function (ajaxData){
          			   $("#ModalEdit").html(ajaxData);
          			   $("#ModalEdit").modal('show',{backdrop: 'true'});
          		   }
        		   });
            });
            $('#mytable').DataTable();
          });
    </script>

    <!-- Javascript untuk popup modal Delete--> 
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
    </script>

</body>
</html>

  



