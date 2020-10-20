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

    <h4 class="card-title">Riwayat</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama Pekerja</th> 
            <th>Nama Majikan</th>
            <th>Negara</th>
            <th>Gaji</th>
            <th>Status Transaksi<th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
					  $no=0;
					  foreach ($data_riwayat as $dt) {
						$no++;
						echo '<tr>
             <td> '.$dt->nama.' </td> 
             <td> '.$dt->nama_user.' </td> 
             <td> '.$dt->nama_negara.'</td>
             <td> '.$dt->gaji_tki.'</td>
             <td> '.$dt->status_transaksi.'</td>
						</tr>';
	  				}
		  		?>
        </tbody>
      </table>
    </div>
  </div>
  </div>