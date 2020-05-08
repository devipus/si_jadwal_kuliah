<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
    include "koneksi.php";
	$id=$_GET['id'];
	$kelas=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id='$id'");
	while($r=mysqli_fetch_array($kelas)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="pros_kelas_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Kode Kelas">Kode Kelas</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                    <input type="text" name="kode_kls"  class="form-control" value="<?php echo $r['kode_kls']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="jml mhs">Jumlah Mahasiswa</label>
     				<input type="text" name="jml_mhs"  class="form-control" value="<?php echo $r['jml_mhs']; ?>" />
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

             <?php } ?>

            </div>

           
        </div>
    </div>