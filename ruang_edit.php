
<?php
    include "koneksi.php";
	$id=$_GET['id'];
	$ruang=mysqli_query($koneksi,"SELECT * FROM ruang WHERE id='$id'");
	while($r=mysqli_fetch_array($ruang)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="pros_ruang_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Kode Ruang">Kode Ruang</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                    <input type="text" name="kode_ruang"  class="form-control" value="<?php echo $r['kode_ruang']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Nama Ruang">Nama Ruang</label>
     				<input type="text" name="nama_ruang"  class="form-control" value="<?php echo $r['nama_ruang']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Kapasitas">Kapasitas</label>
                    <input type="text" name="kapasitas"  class="form-control" value="<?php echo $r['kapasitas']; ?>" />
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

             <?php } ?>

            </div>

           
        </div>
    </div>