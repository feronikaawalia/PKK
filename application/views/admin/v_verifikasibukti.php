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
            <th>Majikan</th>
            <th>Tanggal</th>
            <th>Bukti</th>
            <th>Aksi</th>
          </tr>
          </thead>
          
        <tbody align="center">
          <?php
			    $no=0;
			    foreach ($buktiverifikasi as $bv) {
			    $no++;
			    echo '<tr>
                <td> '.$bv->nama.' </td>
                <td> '.$bv->nama_user.' </td>
                <td> '.$bv->bulan.' </td>
                <td><img src='.base_url("assets/gambar/$bv->bukti").' width="150" height="150"></img></td> 
                <td><a href='.base_url('transaksi/konfirmasi/'.$bv->id_bukti).' onclick="return confirm(\'Yakin mengkonfirmasi pembayaran data ini?\')" class="btn btn-sm btn-danger">Konfirmasi</a>
                <a href='.base_url('transaksi/tolakkonfirmasi/'.$bv->id_bukti).' onclick="return confirm(\'Yakin menolak konfirmasi pembayaran data ini?\')" class="btn btn-sm btn-danger">Ditolak</a></td>
			    </tr>';
	  				}
		  		?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

  