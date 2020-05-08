
<!doctype html>
<html lang="en">
<head>
    <title>Data Ruangan</title>
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
        <p><a href="#" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Tambah</a></p>      

        <table id="mytable" class="table table-bordered">
            <thead>
              <th>No</th>
              <th>Kode Ruang</th>
              <th>Nama Ruang</th>
              <th>Kapasitas</th>
              <th>Action</th>
            </thead>

            <?php 
              //menampilkan data mysqli
              include "koneksi.php";
              $no = 0;
              $ruang=mysqli_query($koneksi,"SELECT * FROM ruang");
              while($r=mysqli_fetch_array($ruang)){
              $no++;
               
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $r['kode_ruang']; ?></td>
                <td><?php echo  $r['nama_ruang']; ?></td>
                <td><?php echo  $r['kapasitas']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
                   <a href="#" onclick="confirm_modal('ruang_delete.php?&id=<?php echo  $r['id']; ?>');">Hapus</a>
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
                <h4 class="modal-title" id="myModalLabel">Data Ruangan</h4>
            </div>

            <div class="modal-body">
              <form action="ruang_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kode Ruang">Kode Ruang</label>
                      <input type="text" name="kode_ruang"  class="form-control" placeholder="Kode Ruang" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Nama Ruang">Nama Ruang</label>
                       <input type="text" name="nama_ruang"  class="form-control" placeholder="Nama Ruang" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kapasitas">Kapasitas</label>
                      <input type="text" name="kapasitas"  class="form-control" placeholder="Kapasitas" required/>
                    </div>

                  <div class="modal-footer">
                      <button class="btn btn-success" type="submit">
                          Simpan
                      </button>

                      <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Batal
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
        			   url: "ruang_edit.php",
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

  



