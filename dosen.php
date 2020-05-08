
<!doctype html>
<html lang="en">
<head>
    <title>Data Dosen</title>
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/DataTables/datatables.min.css" rel="stylesheet">

    <script src="asset/js/jquery-1.10.2.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/DataTables/datatables.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    
</head>
<body>
    <!-- ini untuk konten -->
  <div class="content-wrapper" bgcolor="white" margin-right="30px">

  <section class="content-header">
    <h1>
      Admin <small>Daftar Dosen</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-book"></i>Dashboard</a></li>
      <li class="active">Daftar Dosen</li>
    </ol>
  </section>

  
    <div class="container" style="margin-top:20px margin-right=20px;">
        <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Add Data</a></p>      

        <table id="mytable" class="table table-bordered" bgcolor="white">
            <thead>
              <th>No</th>
              <th>Kode Dosen</th>
              <th>Nama Dosen</th>
              <th>NIP</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Agama</th>
              <th>Pendidikan</th>
              <th>Action</th>
            </thead>

            <?php 
              //menampilkan data mysqli
              include "koneksi.php";
              $no = 0;
              $dosen=mysqli_query($koneksi,"SELECT * FROM dosen");
              while($r=mysqli_fetch_array($dosen)){
              $no++;
               
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $r['kode_dosen']; ?></td>
                <td><?php echo  $r['nama_dosen']; ?></td>
                <td><?php echo  $r['nip']; ?></td>
                <td><?php echo  $r['alamat']; ?></td>
                <td><?php echo  $r['tgl_lahir']; ?></td>
                <td><?php echo  $r['jenkel']; ?></td>
                <td><?php echo  $r['agama']; ?></td>
                <td><?php echo  $r['pendidikan']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
                   <a href="#" onclick="confirm_modal('dosen_delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a>
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
                <h4 class="modal-title" id="myModalLabel">Data Dosen</h4>
            </div>

            <div class="modal-body">
              <form action="dosen_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kode Dosen">Kode Dosen</label>
                      <input type="text" name="kode_dosen"  class="form-control" placeholder="Kode Dosen" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Nama Dosen">Nama Dosen</label>
                       <input name="nama_dosen"  class="form-control" placeholder="Nama Dosen" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="nip">NIP</label>
                      <input type="text" name="nip"  class="form-control" plcaceholder="NIP" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Alamat">Alamat</label>
                      <textarea name="alamat"  class="form-control" placeholder="Alamat"></textarea>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Tanggal Lahir">Tanggal Lahir</label>
                       <input name="tgl_lahir"  type="date" class="form-control" placeholder="Tanggal Lahir" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="jenkel">Jenis Kelamin</label>
                      <select name="jenkel" class="form-control">
                          <option value="P">P</option>
                          <option value="L">L</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Agama">Agama</label>
                      <select name="agama" class="form-control">
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghuchu">Konghuchu</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Pendidikan">Pendidikan</label>
                      <input type="text" name="pendidikan"  class="form-control" plcaceholder="Pendidikan" required/>
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
        			   url: "dosen_edit.php",
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

  



