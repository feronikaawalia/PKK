<div class="table-responsive">
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
        
    <h4 class="card-title">Admin</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
             <th>Nama</th>
             <th>Username</th>
             <th>Password</th>
             <th>Aksi</th>
             </tr>
          </thead>

           <tbody align="center">
             <?php
					    $no=0;
					    foreach ($admin as $a) {
						  $no++;
              
              echo '<tr>
                <td> '.$a->nama_user.' </td> 
                <td> '.$a->username.' </td> 
                <td> '.$a->password.'</td>
                <td><a href="#update_admin" onclick="tm_detail('.$a->id_user.')" class="btn btn-sm btn-warning" data-toggle="modal">Ubah</a>
                <a href='.base_url('index.php/admin/User/hapus/'.$a->id_user).' onclick="return confirm(\'Yakin menghapus data ini?\')" class="btn btn-sm btn-danger">Hapus</a></td>
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
                        <form action="<?= base_url('admin/User/tambah')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user">
                            <label>Nama</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control">
                            <br>
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <br>
                            <label>Password</label>
                            <input type="text" name="password" id="password" class="form-control">
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
                  <div class="modal fade" id="update_admin">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('admin/User/update_admin')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user">
                            <label>Nama</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control">
                            <br>
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <br>
                            <label>Password</label>
                            <input type="text" name="password" id="password" class="form-control">
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
	function tm_detail(id_admin)
	{
		$.getJSON("<?= base_url()?>admin/User/get_detail_admin/"+id_admin, function(data){
			$('#update_admin #id_user').val(data.id_user);
            $('#update_admin #nama_user').val(data.nama_user);
            $('#update_admin #username').val(data.username);
            $('#update_admin #password').val(data.password);

		});
	}
</script>