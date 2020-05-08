
<?php
    include "koneksi.php";
	$id=$_GET['id'];
	$matkul=mysqli_query($koneksi,"SELECT * FROM matkul WHERE id='$id'");
	while($r=mysqli_fetch_array($matkul)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="pros_matkul_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Prodi">Prodi</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                    <select name="prodi">
                            <?php
                                if($r['prodi'] == 'D4') echo "<option value='D4' selected>D4</option>";
                                else echo "<option value='D4'>D4</option>";
                            
                                if($r['prodi'] == 'D3') echo "<option value='D3' selected>D3</option>";
                                else echo "<option value='D3'>D3</option>";
                            ?>
                    </select> 
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Semester">Semester</label>
     				<select name="semester">
                            <?php
                                if($r['semester'] == '1') echo "<option value='1' selected>1</option>";
                                else echo "<option value='1'>1</option>";
                            
                                if($r['semester'] == '2') echo "<option value='2' selected>2</option>";
                                else echo "<option value='2'>2</option>";

                                if($r['semester'] == '3') echo "<option value='3' selected>3</option>";
                                else echo "<option value='3'>3</option>";
                            
                                if($r['semester'] == '4') echo "<option value='4' selected>4</option>";
                                else echo "<option value='4'>4</option>";

                                if($r['semester'] == '5') echo "<option value='5' selected>5</option>";
                                else echo "<option value='5'>5</option>";
                            
                                if($r['semester'] == '6') echo "<option value='6' selected>6</option>";
                                else echo "<option value='6'>6</option>";

                                if($r['semester'] == '7') echo "<option value='7' selected>7</option>";
                                else echo "<option value='7'>7</option>";
                            
                                if($r['semester'] == '8') echo "<option value='8' selected>8</option>";
                                else echo "<option value='8'>8</option>";
                            ?>
                    </select> 
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Kode Mk">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk"  class="form-control" value="<?php echo $r['kode_mk']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Nama Mk">Mata Kuliah</label>
                    <input type="text" name="nama_mk"  class="form-control" value="<?php echo $r['nama_mk']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Jumlah jam">Jumlah Jam</label>
                    <select name="jml_jam">
                            <?php
                                if($r['jml_jam'] == '1') echo "<option value='1' selected>1</option>";
                                else echo "<option value='1'>1</option>";
                            
                                if($r['jml_jam'] == '2') echo "<option value='2' selected>2</option>";
                                else echo "<option value='2'>2</option>";

                                if($r['jml_jam'] == '3') echo "<option value='3' selected>3</option>";
                                else echo "<option value='3'>3</option>";
                            
                                if($r['jml_jam'] == '4') echo "<option value='4' selected>4</option>";
                                else echo "<option value='4'>4</option>";
                            ?>
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

             <?php } ?>

            </div>

           
        </div>
    </div>