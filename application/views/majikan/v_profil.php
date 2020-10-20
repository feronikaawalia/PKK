<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Profil</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>

<?php foreach($profil as $p){?>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card">
                  <div class="card-body">
                  <div>
                  </div>
                    <p class="card-description">Nama : <?= $p->nama_user ?></p>
                    <p class="card-description">Username : <?= $p->username ?></p>
                    <p class="card-description">Password : <?= $p->password ?></p>
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn btn-rounded" href="#update_profil" onclick="tm_detail(3)" data-toggle="modal">Ubah</button>
                  </div>
                </div>
                
                </div>
              </div>
            </div>
<?php }?>

  <!-- UPDATE -->
  <div class="modal fade" id="update_profil">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('admin/user/update_profil')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user">
                            
                            <label>Nama</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control">
                            <br>
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <br>
                            <label>Passowrd</label>
                            <input type="text" name="password" id="password" class="form-control">
                            <br>     
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
	function tm_detail(id_user)
	{
		$.getJSON("<?= base_url()?>admin/user/get_detail_profil/"+id_user, function(data){
			$('#id_user').val(data.id_user);
            $('#nama_user').val(data.nama_user);
            $('#username').val(data.username);
            $('#password').val(data.password);
		});
	}
</script>
