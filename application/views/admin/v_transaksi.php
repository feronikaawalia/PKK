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

    <h4 class="card-title">Transaksi</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama Pekerja</th> 
            <th>Nama Majikan</th>
            <th>Negara</th>
            <th>Gaji</th>
            <th>Aksi</th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
					  $no=0;
					  foreach ($data_transaksi as $dt) {
						$no++;
						echo '<tr>
             <td> '.$dt->nama.' </td> 
             <td> '.$dt->nama_user.' </td> 
             <td> '.$dt->nama_negara.'</td>
             <td> '.$dt->gaji_tki.'</td>
             <td> <a href='.base_url('Transaksi/terima/'.$dt->id_transaksi.'/'.$dt->id_tenaga).' class="btn btn-sm btn-danger">Terima</a>
             <a href='.base_url('Transaksi/tolak/'.$dt->id_transaksi).' class="btn btn-sm btn-danger">Tolak</a>
            </td>
							</tr>';
	  				}
		  		?>
        </tbody>
      </table>
    </div>
  </div>
  </div>