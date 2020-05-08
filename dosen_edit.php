<?php
    include "koneksi.php";
	$id=$_GET['id'];
	$dosen=mysqli_query($koneksi,"SELECT * FROM dosen WHERE id='$id'");
	while($r=mysqli_fetch_array($dosen)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="pros_dosen_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Kode Dosen">Kode Dosen</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                    <input type="text" name="kode_dosen" class="form-control" value="<?php echo $r['kode_dosen']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Nama Dosen">Nama Dosen</label>
     				<input type="text" name="nama_dosen"  class="form-control" value="<?php echo $r['nama_dosen']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="nip">NIP</label>       
     				<input type="text" name="nip"  class="form-control" value="<?php echo $r['nip']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="alamat"  class="form-control" value="<?php echo $r['alamat']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Tanggal Lahir">Tanggal Lahir</label>       
                    <input type="date" name="tgl_lahir"  class="form-control" value="<?php echo $r['tgl_lahir']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="jenkel">Jenis Kelamin</label>
                    <select name="jenkel" class="form-control">
                            <?php
                                if($r['jenkel'] == 'P') echo "<option value='P' selected>P</option>";
                                else echo "<option value='P'>P</option>";
                            
                                if($r['jenkel'] == 'L') echo "<option value='L' selected>L</option>";
                                else echo "<option value='L'>L</option>";
                            ?>
                    </select>   
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Agama">Agama</label>       
                    <select name="agama" class="form-control">
                            <?php
                                if($r['agama'] == 'Islam') echo "<option value='Islam' selected>Islam</option>";
                                else echo "<option value='Islam'>Islam</option>";
                            
                                if($r['agama'] == 'Kristen') echo "<option value='Kristen' selected>Kristen</option>";
                                else echo "<option value='Kristen'>Kristen</option>";

                                if($r['agama'] == 'Hindu') echo "<option value='Hindu' selected>Hindu</option>";
                                else echo "<option value='Hindu'>Hindu</option>";

                                if($r['agama'] == 'Budha') echo "<option value='Budha' selected>Budha</option>";
                                else echo "<option value='Budha'>Budha</option>";

                                if($r['agama'] == 'Konghuchu') echo "<option value='Konghuchu' selected>Konghuchu</option>";
                                else echo "<option value='Konghuchu'>Konghuchu</option>";
                            ?>
                    </select> 
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Pendidikan">Pendidikan</label>       
                    <input type="text" name="pendidikan"  class="form-control" value="<?php echo $r['pendidikan']; ?>" />
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