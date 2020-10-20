<div class="card">

  <div class="card-body">

  <?php
            if ($this->session->flashdata('pesan') == TRUE) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=$this->session->flashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php
            }
        ?>


    <h4 class="card-title">Pelatihan</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama</th> 
             <th>Bahasa</th>
             <th>Keterampilan</th>
             <th>Kedisiplinan</th>
             <th>Praktek</th>
             <th>Keterangan</th>
             <th>Status</th>
             <th>Aksi</th>
             </tr>
          </thead>

           <tbody align="center">
             <?php
					    $no=0;
					    foreach ($pelatihan as $p) {
						  $no++;
              
              echo '<tr>
                <td> '.$p->nama.' </td> 
                <td> '.$p->bahasa.' </td> 
                <td> '.$p->keterampilan.'</td>
                <td> '.$p->nilai_kedisiplinan.'</td>
                <td> '.$p->nilai_praktek.' </td> 
                <td> '.$p->keterangan.' </td> 
                <td> '.$p->status.'</td>
                <td><a href="#update_pelatihan" onclick="tm_detail('.$p->id_pelatihan.')" class="btn btn-sm btn-warning" data-toggle="modal">Ubah</a>
                <a href='.base_url('admin/Pelatihan/hapus/'.$p->id_pelatihan).' onclick="return confirm(\'Yakin menghapus data ini?\')" class="btn btn-sm btn-danger">Hapus</a></td>
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

                <!-- TAMBAH -->
                <div class="modal fade" id="tambah">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('admin/Pelatihan/tambah')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_pelatihan" id="id_tenaga">

                            <label>Nama</label>
                            <select name="id_tenaga" id="id_tenaga" class="form-control">
                              <option>-- Nama Tenaga --</option>
                              <?php
					                    foreach ($tenaga_kerja as $t) {?>
                               <option value="<?= $t->id_tenaga?>" class="form-control"><?= $t->nama?></option>
                              <?php } ?>
                            </select>  
                            <br>

                            <label>Bahasa</label>
                            <select name="bahasa" id="bahasa" class="form-control">
                              <option value="Inggris"> Inggris </option>
                              <option value="Melayu"> Melayu </option>
                              <option value="Mandarin"> Mandarin </option>
                              <option value="Cantonese"> Cantonese </option>
                            </select>  
                            <br>

                            <label>Keterampilan</label>
                            <select name="keterampilan" id="keterampilan" class="form-control">
                              <option value="Memasak"> Memasak </option>
                              <option value="Menjaga anak"> Menjaga Anak </option>
                              <option value="Bersih-bersih"> Bersih-bersih </option>
                              <option value="Menjaga orang tua"> Menjaga Orang Tua </option>
                            </select>  
                            <br>

                            <label>Kedisiplinan</label>
                            <input type="number" name="nilai_kedisiplinan" id="nilai_kedisiplinan" class="form-control">
                            <br>
                            <label>Praktek</label>
                            <input type="number" name="nilai_praktek" id="nilai_praktek" class="form-control">
                            <br>
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
                            <br>
                            <label>Status</label>
                            <select name="id_status" id="id_status" class="form-control">
                              <option value="" class="form-control btn btn-info"> -- Keterangan --</option>
                              <option value="1" class="form-control">Lulus</option>
                              <option value="2" class="form-control">Tidak Lulus</option>
                          </select> <br>             
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


                <!-- UPDATE -->
                <div class="modal fade" id="update_pelatihan">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('admin/Pelatihan/update_pelatihan')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_pelatihan" id="id_pelatihan">

                            <label>Nama</label>
                            <select name="id_tenaga" id="id_tenaga" class="form-control" disabled>
                              <option>-- Tenaga Kerja --</option>
                              <?php
					                    foreach ($nama_tenaga as $l) {?>
                               <option value="<?= $l->id_tenaga?>" class="form-control"><?= $l->nama?></option>
                              <?php } ?>
                          </select>   
                          
                            <br>
                            <input type="hidden" name="id_tenaga" id="id_tenaga" class="form-control">
                            
                            <label>Bahasa</label>
                            <select name="bahasa" id="bahasa" class="form-control">
                              <option value="Inggris"> Inggris </option>
                              <option value="Melayu"> Melayu </option>
                              <option value="Mandarin"> Mandarin </option>
                              <option value="Cantonese"> Cantonese </option>
                            </select>  
                            <br>

                            <label>Keterampilan</label>
                            <select name="keterampilan" id="keterampilan" class="form-control">
                              <option value="Memasak"> Memasak </option>
                              <option value="Menjaga anak"> Menjaga Anak </option>
                              <option value="Bersih-bersih"> Bersih-bersih </option>
                              <option value="Menjaga orang tua"> Menjaga Orang Tua </option>
                            </select>  
                            <br>
                            
                            <label>Kedisiplinan</label>
                            <input type="text" name="nilai_kedisiplinan" id="nilai_kedisiplinan" class="form-control">
                            <br>
                            <label>Praktek</label>
                            <input type="text" name="nilai_praktek" id="nilai_praktek" class="form-control">
                            <br>
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
                            <br>
                            <label>Status</label>
                            <select name="id_status" id="id_status" class="form-control">
                              <option value="" class="form-control btn btn-info"> -- Keterangan --</option>
                              <option value="1" class="form-control">Lulus</option>
                              <option value="2" class="form-control">Tidak Lulus</option>
                          </select> <br>             
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
	function tm_detail(id_pelatihan)
	{
		$.getJSON("<?= base_url()?>admin/pelatihan/get_detail_pelatihan/"+id_pelatihan, function(data){
			$('#update_pelatihan #id_pelatihan').val(data.id_pelatihan);
      $('#update_pelatihan #id_tenaga').val(data.id_tenaga);
			$('#update_pelatihan #bahasa').val(data.bahasa);
      $('#update_pelatihan #keterampilan').val(data.keterampilan);
      $('#update_pelatihan #nilai_kedisiplinan').val(data.nilai_kedisiplinan);
      $('#update_pelatihan #nilai_praktek').val(data.nilai_praktek);
      $('#update_pelatihan #keterangan').val(data.keterangan);
      $('#update_pelatihan #id_status').val(data.id_status);
		});
	}
</script>