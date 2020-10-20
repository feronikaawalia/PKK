<div class="card">
  <div class="card-body">

  <?php
            if ($this->session->flashdata('pesan') == TRUE) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$this->session->flashdata('pesan')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php
            }
        ?>

    <h4 class="card-title">Tenaga Kerja</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama</th> 
            <th>Kota Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Hp</th>
            <th>Pendidikan</th>
            <th>Status</th>
            <th>Negara</th>
            <th>Aksi</th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
					  $no=0;
					  foreach ($tenaga_kerja as $kerja) {
						$no++;
						echo '<tr>
             <td> '.$kerja->nama.' </td> 
             <td> '.$kerja->kota_lahir.' </td> 
             <td> '.$kerja->tanggal_lahir.' </td> 
             <td> '.$kerja->alamat.'</td>
             <td> '.$kerja->jenis_kelamin.'</td>
             <td> '.$kerja->nohp.' </td> 
             <td> '.$kerja->pendidikan.' </td> 
             <td> '.$kerja->status_tenaga.'</td>
             <td> '.$kerja->nama_negara.' </td> 
             <td><a href="#update_tenagakerja" onclick="tm_detail('.$kerja->id_tenaga.')" class="btn btn-sm btn-warning" data-toggle="modal">Ubah</a>
             <a href='.base_url('admin/Tenagakerja/hapus/'.$kerja->id_tenaga).' onclick="return confirm(\'Yakin menghapus data ini?\')" class="btn btn-sm btn-danger">Hapus</a></td>
							</tr>';
	  				}
		  		?>
        </tbody>
      </table>
    </div>
    <div class="card">
      <br>
        <td>
          <a href="#tambah" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" data-toggle="modal"><span class="glyphicon glyphicon-plus"> </span>Tambah</a>
        </td>
      </div>
  </div>
  </div>

                <!-- UPDATE -->
                <div class="modal fade" id="update_tenagakerja">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">

                        <form action="<?= base_url('admin/Tenagakerja/update_tenagakerja')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_tenaga" id="id_tenaga">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <br>
                            <label>Kota Lahir</label>
                            <input type="text" name="kota_lahir" id="kota_lahir" class="form-control">
                            <br>
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                            <br>
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                            <br>
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <br>
                            <br>
                            <label>No Hp</label>
                            <input type="text" name="nohp" id="nohp" class="form-control">
                            <br>
                            <label>Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                              <option value="SD"> SD </option>
                              <option value="SMP"> SMP </option>
                              <option value="SMK"> SMK </option>
                              <option value="SMA"> SMA </option>
                            </select>  
                            <br>
                            <label>Status</label>
                            <select name="status_tenaga" id="status_tenaga" class="form-control">
                              <option value="Sudah Menikah"> Sudah Menikah </option>
                              <option value="Belum Menikah"> Belum Menikah </option>
                            </select>  
                            <br>

                            <label>Negara</label>
                            <select name="id_negara" id="id_negara" class="form-control">
                            <option>-- Daftar Negara --</option>
                              <?php
					                    foreach ($negara as $l) {?>
                               <option value="<?= $l->id_negara?>" class="form-control"><?= $l->nama_negara?></option>
                              <?php } ?>
                          </select>  
                            <br>

                            <div class="modal-footer">
                            <button class="btn btn-block btn-lg font-weight-medium auth-form-btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Simpan</button>
                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- TAMBAH -->
                <div class="modal fade" id="tambah">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                      <form action="<?= base_url('admin/Tenagakerja/tambah')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_tenaga" id="id_tenaga">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <br>
                            <label>Kota Lahir</label>
                            <input type="text" name="kota_lahir" id="kota_lahir" class="form-control">
                            <br>
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                            <br>
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                            <br>
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <br>
                            <label>No Hp</label>
                            <input type="text" name="nohp" id="nohp" class="form-control">
                            <br>
                            <label>Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                              <option value="SD"> SD </option>
                              <option value="SMP"> SMP </option>
                              <option value="SMK"> SMK </option>
                              <option value="SMA"> SMA </option>
                            </select>  
                            <br>
                            <br>
                            <label>Status</label>
                            <select name="status_tenaga" id="status_tenaga" class="form-control">
                              <option value="Sudah Menikah"> Sudah Menikah </option>
                              <option value="Belum Menikah"> Belum Menikah </option>
                            </select>  
                            <br>

                            <label>Negara</label>
                            <select name="id_negara" id="id_negara" class="form-control">
                            <option>-- Daftar Negara --</option>
                              <?php
					                    foreach ($negara as $l) {?>
                               <option value="<?= $l->id_negara?>" class="form-control"><?= $l->nama_negara?></option>
                              <?php } ?>
                          </select>  
                            <br>

                            <div class="modal-footer">
                            <button class="btn btn-block btn-lg font-weight-medium auth-form-btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Simpan</button>
                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

<script type="text/javascript">
	function tm_detail(id_tenaga)
	{
		$.getJSON("<?= base_url()?>admin/tenagakerja/get_detail_tenaga_kerja/"+id_tenaga, function(data){
			$('#id_tenaga').val(data['id_tenaga']);
			$('#nama').val(data['nama']);
      $('#kota_lahir').val(data['kota_lahir']);
			$('#tanggal_lahir').val(data['tanggal_lahir']);
			$('#alamat').val(data['alamat']);
      $('#jenis_kelamin').val(data['jenis_kelamin']);
      $('#nohp').val(data['nohp']);
      $('#pendidikan').val(data['pendidikan']);
			$('#status_tenaga').val(data['status_tenaga']);
			$('#id_negara').val(data['id_negara']);
		});
	}
</script>