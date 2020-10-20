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

    <h4 class="card-title">Riwayat Bukti</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>Nama Pekerja</th>
            <th>Tanggal</th>
            <th>Status Bukti<th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
					  $no=0;
					  foreach ($data_riwayat as $dt) {
						$no++;
						echo '<tr>
             <td> '.$dt->nama.' </td> 
             <td> '.$dt->bulan.' </td> 
             <td> '.$dt->status_bukti.'</td>
						</tr>';
	  				}
		  		?>
        </tbody>
      </table>
    </div>
  </div>
  </div>