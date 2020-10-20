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
        
    <h4 class="card-title">Verifikasi</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama</th> 
            <th>Kartu Keluarga</th>
            <th>Akta Kelahiran</th>
            <th>Passport</th>
            <th>Data Kesehatan</th>
            <th>Pas Foto</th>
            <th>Buku Tabungan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
			    $no=0;
			    foreach ($verifikasi as $v) {
			    $no++;
			    echo '<tr>
             <td> '.$v->nama.' </td> 
             <td><img src='.base_url("assets/gambar/$v->kartukeluarga").' width="150" height="150"></img></td> 
             <td><img src='.base_url("assets/gambar/$v->aktakelahiran").' width="150" height="150"></img></td> 
             <td><img src='.base_url("assets/gambar/$v->passport").' width="150" height="150"></img></td> 
             <td><img src='.base_url("assets/gambar/$v->datakesehatan").' width="150" height="150"></img></td> 
             <td><img src='.base_url("assets/gambar/$v->pasfoto").' width="150" height="150"></img></td> 
             <td><img src='.base_url("assets/gambar/$v->bukutabungan").' width="150" height="150"></img></td> 
             <td> '.$v->status.' </td> 
             <td><a href="#update_verifikasi" onclick="tm_detail('.$v->id_verifikasi.')" class="btn btn-sm btn-warning" data-toggle="modal">Ubah</a>
             <a href='.base_url('admin/Verifikasi/hapus/'.$v->id_verifikasi).' onclick="return confirm(\'Yakin menghapus data ini?\')" class="btn btn-sm btn-danger">Hapus</a></td>
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
                        <form action="<?= base_url('admin/Verifikasi/tambah')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_verifikasi" id="id_verifikasi">

                            <label>Nama</label>
                            <select name="id_tenaga" id="id_tenaga" class="form-control">
                              <option>-- Nama Tenaga --</option>
                              <?php
					                    foreach ($tenaga_kerja as $t) {?>
                               <option value="<?= $t->id_tenaga?>" class="form-control"><?= $t->nama?></option>
                              <?php } ?>
                            </select>  
                            <br>
                            <label>Kartu Keluarga</label>
                            <input type="file" name="kartukeluarga" id="kartukeluarga" class="form-control">
                            <br>
                            <label>Akta Kelahiran</label>
                            <input type="file" name="aktakelahiran" id="aktakelahiran" class="form-control">
                            <br>
                            <label>Passport</label>
                            <input type="file" name="passport" id="passport" class="form-control">
                            <br>
                            <label>Data Kesehatan</label>
                            <input type="file" name="datakesehatan" id="datakesehatan" class="form-control">
                            <br>
                            <label>Pas Foto</label>
                            <input type="file" name="pasfoto" id="pasfoto" class="form-control">
                            <br>
                            <label>Buku Tabungan</label>
                            <input type="file" name="bukutabungan" id="bukutabungan" class="form-control">
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