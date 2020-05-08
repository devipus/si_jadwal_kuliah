
<!doctype html>
<html lang="en">
<head>
    <title>Data Mata Kuliah</title>
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
              <th>Prodi</th>
              <th>Semester</th>
              <th>Kode Mata Kuliah</th>
              <th>Mata Kuliah</th>
              <th>Jumlah Jam</th>
              <th>Action</th>
            </thead>

            <?php 
              //menampilkan data mysqli
              include "koneksi.php";
              $no = 0;
              $matkul=mysqli_query($koneksi,"SELECT * FROM matkul");
              while($r=mysqli_fetch_array($matkul)){
              $no++;
               
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $r['prodi']; ?></td>
                <td><?php echo  $r['semester']; ?></td>
                <td><?php echo  $r['kode_mk']; ?></td>
                <td><?php echo  $r['nama_mk']; ?></td>
                <td><?php echo  $r['jml_jam']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $r['id']; ?>'>Edit</a>
                   <a href="#" onclick="confirm_modal('matkul_delete.php?&id=<?php echo  $r['id']; ?>');">Delete</a>
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
                <h4 class="modal-title" id="myModalLabel">Data Mata Kuliah</h4>
            </div>

            <div class="modal-body">
              <form action="matkul_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                    
                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Prodi">Prodi</label>
                      <select name="prodi" class="form-control">
                          <option value="D4">D4</option>
                          <option value="D3">D3</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Semester">Semester</label>
                      <select name="semester" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Kode Mk">Kode Mata Kuliah</label>
                      <input type="text" name="kode_mk"  class="form-control" placeholder="Kode Mata Kuliah" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Nama Mk">Mata Kuliah</label>
                      <input type="text" name="nama_mk"  class="form-control" placeholder="Nama Mata Kuliah" required/>
                    </div>

                    <div class="form-group" style="padding-bottom: 8px;">
                      <label for="Jumlah jam">Jumlah Jam</label>
                      <select name="jml_jam" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
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
        			   url: "matkul_edit.php",
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

  



