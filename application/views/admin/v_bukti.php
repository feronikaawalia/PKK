<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Upload Bukti</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>

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

            <form action="<?= base_url('transaksi/upload_bukti')?>" method="post" enctype="multipart/form-data">
                            <label>Nama Tenaga</label>
                            <select name="id_transaksi" id="id_transaksi" class="form-control form-control-lg">
                              <?php foreach($pekerja as $p){?>
                                <option value="<?= $p->id_transaksi?>"><?= $p->nama?></option>
                              <?php } ?>
                            </select>
                            <br>
                            <label>Upload Bukti</label>
                            <input type="file" name="bukti" id="bukti" class="form-control">
                            <br>
                            <label>Tanggal</label>
                            <input type="date" name="bulan" id="bulan" class="form-control">
                            <div class="modal-footer">
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Simpan</button>
                            </div>

            </form>
                        

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
