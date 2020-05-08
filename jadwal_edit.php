<?php
    include "koneksi.php";

    // perintah query untuk ambil data barang
    $query_jam = 'SELECT * FROM jam';
    $res_jam = mysqli_query($koneksi, $query_jam);

    // perintah query untuk ambil data kode matkul
    $query_kodemk = 'SELECT * FROM matkul';
    $res_kodemk = mysqli_query($koneksi, $query_kodemk);

    // perintah query untuk ambil data kode dosen
    $query_nmDosen = 'SELECT * FROM dosen';
    $res_nmDosen = mysqli_query($koneksi, $query_nmDosen);

    // perintah query untuk ambil data kelas
    $query_kdKelas = 'SELECT * FROM kelas';
    $res_kdKelas = mysqli_query($koneksi, $query_kdKelas);

    // perintah query untuk ambil data ruang
    $query_kdRuang = 'SELECT * FROM ruang';
    $res_kdRuang = mysqli_query($koneksi, $query_kdRuang);

	$id=$_GET['id'];
	$jadwal=mysqli_query($koneksi,"SELECT * FROM jadwal WHERE id='$id'");
	while($r=mysqli_fetch_array($jadwal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="pros_jadwal_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 8px;">
                	<label for="Hari">Hari</label>
                    <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
                    <select name="hari" class="form-control">
                             <option value="">-- Pilih --</option>
                            <?php
                                if($r['hari'] == 'Senin') echo "<option value='Senin' selected>Senin</option>";
                                else echo "<option value='Senin'>Senin</option>";
                            
                                if($r['hari'] == 'Selasa') echo "<option value='Selasa' selected>Selasa</option>";
                                else echo "<option value='Selasa'>Selasa</option>";

                                if($r['hari'] == 'Rabu') echo "<option value='Rabu' selected>Rabu</option>";
                                else echo "<option value='Rabu'>Rabu</option>";
                            
                                if($r['hari'] == 'Kamis') echo "<option value='Kamis' selected>Kamis</option>";
                                else echo "<option value='Kamis'>Kamis</option>";

                                if($r['hari'] == 'Jumat') echo "<option value='Jumat' selected>Jumat</option>";
                                else echo "<option value='Jumat'>Jumat</option>";
                            
                                if($r['hari'] == 'Sabtu') echo "<option value='Sabtu' selected>Sabtu</option>";
                                else echo "<option value='Sabtu'>Sabtu</option>";

                                if($r['hari'] == 'Minggu') echo "<option value='Minggu' selected>MInggu</option>";
                                else echo "<option value='Minggu'>Minggu</option>";
                            ?>
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
                              <option value="<?php echo $kode_mk["kode_mk"]?>" >
                                  <?php  echo $kode_mk["kode_mk"] ?>
                              </option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group" style="padding-bottom: 8px;">
                    <label for="Nama Mk">Mata Kuliah</label>
                    <input type="text" name="nama_mk"  class="form-control" value="<?php echo $r['nama_mk']; ?>" />
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
                            <?php
                                if($r['prodi'] == 'D3') echo "<option value='D3' selected>D3</option>";
                                else echo "<option value='D3'>D3</option>";
                            
                                if($r['prodi'] == 'D4') echo "<option value='D4' selected>D4</option>";
                                else echo "<option value='D4'>D4</option>";
                            ?>
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
                    <label for="Tahun Ajaran">Tahun Ajaran</label>       
                    <input type="text" name="tahun_ajaran"  class="form-control" value="<?php echo $r['tahun_ajaran']; ?>" />
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