<div class="col-md-12">
    <div class="card">

        <div class="panel-heading"></div>

        <div class="panel-body">
                <table class="table table-responsive">
                    <form action="/absen" method="post">
                        <!-- {{csrf_field()}} -->
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="keterangan..." name="note">
                            </td>
                            <td>
                                <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"> </span>Tambah</a>
                            </td>
                        </tr>
                    </form>
                </table>
        </div>

        <div class="card-header card-header-primary">
            <h4 class="card-title "> TENAGA KERJA </h4>
            <p class="card-category">  </p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>Nama</th>
                <th>TTL</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Hp</th>
                <th>Pendidikan</th>
                <th>Daftar</th>
                <th>Status</th>
                <th>KTP</th>
                <th>Negara</th>
                <th>Verifikasi</th>
                <th>Pelatihan</th>
                <th>Action</th>
                </thead>

                <tbody>
                <?php
					$no=0;
					foreach ($data_tenaga_kerja as $kerja) {
						$no++;
						echo '<tr>
                                <td> '.$kerja->nama.' </td>
                                <td> '.$kerja->ttl.' </td>
                                <td> '.$kerja->alamat.'</td>
                                <td> '.$kerja->jenis_kelamin.'</td>
                                <td> '.$kerja->nohp.' </td>
                                <td> '.$kerja->pendidikan.' </td>
                                <td> '.$kerja->tgl_daftar.'</td>
                                <td> '.$kerja->status.'</td>
                                <td> '.$kerja->ktp.' </td>
                                <td> '.$kerja->id_negara.' </td>
                                <td> '.$kerja->id_verifikasi.'</td>
                                <td> '.$kerja->id_pelatihan.'</td>
								<td><a href="#update_tenagakerja" onclick="tm_detail('.$kerja->id_tenaga.')" class="btn btn-sm btn-warning" data-toggle="modal">Ubah</a>
									<a href='.base_url('index.php/Tenagakerja/hapus/'.$kerja->id_tenaga).' onclick="return confirm(\'Yakin menghapus data ini?\')" class="btn btn-sm btn-danger">Hapus</a></td>
							</tr>';
					}
				?>
                </tbody>
            </table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah TenagaKerja</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Tenagakerja/tambah')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_tenaga">
            <label>Nama</label>
            <input type="text" name="nama"  class="form-control">

            <label>TTL</label>
            <input type="text" name="ttl"  class="form-control">

            <label>Alamat</label>
            <input type="text" name="alamat"  class="form-control">

            <label>Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin"  class="form-control">

            <label>No Hp</label>
            <input type="text" name="nohp"  class="form-control">

            <label>Pendidikan</label>
            <input type="text" name="pendidikan"  class="form-control">

            <label>Tgl Daftar</label>
            <input type="date" name="tgl_daftar"  class="form-control">

            <label>Status</label>
            <input type="text" name="status"  class="form-control">

            <label>KTP</label>
            <input type="text" name="ktp"  class="form-control">

            <label>Negara</label>
            <input type="text" name="id_negara" class="form-control">

            <label>Verifikasi</label>
            <input type="text" name="id_verifikasi"  class="form-control">

            <label>Pelatihan</label>
            <input type="text" name="id_pelatihan"  class="form-control">

            <br>

            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="update_tenagakerja">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Ubah Data</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Tenagakerja/update_tenagakerja')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_tenaga" id="id_tenaga">
            <label>Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">

            <label>TTL</label>
            <input type="text" name="ttl" id="ttl" class="form-control">

            <label>Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control">

            <label>Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control">

            <label>No Hp</label>
            <input type="text" name="nohp" id="nohp" class="form-control">

            <label>Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="form-control">

            <label>Tgl Daftar</label>
            <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control">

            <label>Status</label>
            <input type="text" name="status" id="status" class="form-control">

            <label>KTP</label>
            <input type="text" name="ktp" id="ktp" class="form-control"

            <label>Negara</label>
            <input type="text" name="id_negara" id="id_negara" class="form-control">

            <label>Verifikasi</label>
            <input type="text" name="id_verifikasi" id="id_verifikasi" class="form-control">

            <label>Pelatihan</label>
            <input type="text" name="id_pelatihan" id="id_pelatihan" class="form-control">

            <br>

            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function tm_detail(id_tenaga)
  <script type="text/javascript">
  	function tm_detail(id_tenaga)
  	{
  		$.getJSON("<?= base_url()?>index.php/tenagakerja/get_detail_tenaga_kerja/"+id_tenaga,function(data){
  			$('#id_tenaga').val(data['id_tenaga']);
  			$('#nama').val(data['nama']);
  			$('#ttl').val(data['ttl']);
  			$('#alamat').val(data['alamat']);
              $('#jenis_kelamin').val(data['jenis_kelamin']);
              $('#nohp').val(data['nohp']);
              $('#pendidikan').val(data['pendidikan']);
  			$('#tgl_daftar').val(data['tgl_daftar']);
  			$('#status').val(data['status']);
              $('#ktp').val(data['ktp']);
  			$('#id_negara').val(data['id_negara']);
  			$('#id_verifikasi').val(data['id_verifikasi']);
  			$('#id_pelatihan').val(data['id_pelatihan']);
  		});
  	}
  </script>
	{
		$.getJSON("<?= base_url()?>index.php/tenagakerja/get_detail_tenaga_kerja/"+id_tenaga,function(data){
			$('#id_tenaga').val(data['id_tenaga']);
			$('#nama').val(data['nama']);
			$('#ttl').val(data['ttl']);
			$('#alamat').val(data['alamat']);
            $('#jenis_kelamin').val(data['jenis_kelamin']);
            $('#nohp').val(data['nohp']);
            $('#pendidikan').val(data['pendidikan']);
			$('#tgl_daftar').val(data['tgl_daftar']);
			$('#status').val(data['status']);
            $('#ktp').val(data['ktp']);
			$('#id_negara').val(data['id_negara']);
			$('#id_verifikasi').val(data['id_verifikasi']);
			$('#id_pelatihan').val(data['id_pelatihan']);
		});
	}
</script>
