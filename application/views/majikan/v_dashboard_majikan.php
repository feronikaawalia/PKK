            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Tenaga Kerja</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
                <div class="dropdown">
                  <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">Negara</button>
                  <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url('majikan/dashboard_majikan/index')?>">Semua Negara </a>
                    <a class="dropdown-item" href="<?= base_url('majikan/dashboard_majikan/negara/Singapura')?>">Singapura</a>
                    <a class="dropdown-item" href="<?= base_url('majikan/dashboard_majikan/negara/Malaysia')?>">Malaysia</a>
                    <a class="dropdown-item" href="<?= base_url('majikan/dashboard_majikan/negara/Hongkong')?>">Hongkong</a>
                    <a class="dropdown-item" href="<?= base_url('majikan/dashboard_majikan/negara/Taiwan')?>">Taiwan</a>
                   </div>
              </div>
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


      <?php foreach($tenaga_kerja as $a){?>
              <div class="col-md-3 grid-margin" style="display:inline-flex">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card">
                    <div class="card-body">
                      <center>
                        <img src='<?= base_url("assets/gambar/$a->pasfoto")?>' width="150" height="100"></img>
                        </center>
                        <br>
                          <h3 class="card-title"><?= $a->nama ?></h3>
                          <p class="card-description">Gaji : <?= $a->gaji_admin ?></p>
                       <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn btn-rounded" href="#modal_tenaga" onclick="tm_detail(<?= $a->id_tenaga?>)" data-toggle="modal">Detail</button>
                    </div>
                  </div>
                </div>
              </div>
           <?php }?>


              <div class="modal fade" id="modal_tenaga">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">

                        <form action="<?= base_url('transaksi/tambah')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user" value=" <?= $this->session->userdata('id_user')?>">
                            <input type="hidden" name="id_tenaga" id="id_tenaga" >
                            <label>Nama Tenaga</label>
                            <input type="text" name="nama" id="nama" class="form-control" disabled>
                            <br>
                            <label>Kota Lahir</label>
                            <input type="text" name="kota_lahir" id="kota_lahir" class="form-control" disabled>
                            <br>
                            <label>Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" disabled>
                            <br>
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" disabled>
                            <br>
                            <label>Bahasa</label>
                            <input type="text" name="bahasa" id="bahasa" class="form-control" disabled>
                            <br>
                            <label>Keterampilan</label>
                            <input type="text" name="keterampilan" id="keterampilan" class="form-control" disabled>
                            <br>
                            <div class="modal-footer">
                            <button class="btn btn-block btn-lg font-weight-medium auth-form-btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" name="simpan" value="Simpan" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Sewa</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <script type="text/javascript">


	function tm_detail(id_tenaga)
	{
		$.getJSON("<?= base_url()?>admin/tenagakerja/get_detail/"+id_tenaga, function(data){
			$('#id_tenaga').val(data['id_tenaga']);
      $('#nama').val(data['nama']);
      $('#kota_lahir').val(data['kota_lahir']);
      $('#tanggal_lahir').val(data['tanggal_lahir']);
      $('#pendidikan').val(data['pendidikan']);
      $('#bahasa').val(data['bahasa']);
      $('#keterampilan').val(data['keterampilan']);
		});
	}
</script> 