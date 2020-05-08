
<!doctype html>
<html lang="en">
<head>
    <title>Data Kelas</title>
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
              <th>Kode Kelas</th>
              <th>Jumlah Mahasiswa</th>
              <th>Action</th>
            </thead>

            <?php 
              //menampilkan data mysqli
              include "koneksi.php";
              $no = 0;
              $kelas=mysqli_query($koneksi,"SELECT * FROM kelas");
              while($r=mysqli_fetch_array($kelas)){
              $no++;
               
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $r['kode_kls']; ?></td>
                <td><?php echo  $r['jml_mhs']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
                   <a href="#" onclick="confirm_modal('kelas_delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a>
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
                <h4 class="modal-title" id="myModalLabel">Data Kelas</h4>
            </div>

            <div class="modal-body">
              <form action="kelas_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kode Kelas">Kode Kelas</label>
                      <input type="text" name="kode_kls"  class="form-control" placeholder="Kode Kelas" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Jml Mhs">Jumlah Mahasiswa</label>
                       <input name="jml_mhs"  class="form-control" placeholder="Jumlah Mahasiswa" required/>
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
        			   url: "kelas_edit.php",
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

  



