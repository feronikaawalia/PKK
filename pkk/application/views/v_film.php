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
            <h4 class="card-title "> Film </h4>
            <p class="card-category">  </p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>Tittle</th> 
                <th>Year</th>
                <th>Genre</th>
                <th>Sinopsis</th>
                <th>Officialsite</th>
                <th>Photo</th>
                <th>Action</th>
                </thead>
                
                <tbody>
                <?php
					$no=0;
					foreach ($data_film as $film) {
						$no++;
						echo '<tr>
                                <td> '.$film->title.' </td> 
                                <td> '.$film->year.' </td> 
                                <td> '.$film->genre.'</td>
                                <td> '.$film->sinopsis.'</td>
                                <td> '.$film->officialsite.'</td>
                                <td><img src='.base_url("assets/gambar/$film->photo").' width="100px" height="75px"></td>
								<td><a href="#update" onclick="tm_detail('.$film->id_film.')" class="btn btn-warning" data-toggle="modal">Ubah</a>
									<a href='.base_url('index.php/Film/hapus/'.$film->id_film).' onclick="return confirm(\'anda yakin menghapus item ini?\')" class="btn btn-danger">Hapus</a></td>
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
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Film/tambah')?>" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="id_film">

            <label>Tittle</label>
            <input type="text" name="tittle"  class="form-control">

            <label>Year</label>
            <input type="text" name="year"  class="form-control">

            <label>Genre</label>
            <input type="text" name="genre"  class="form-control">

            <label>Sinopsis</label>
            <input type="text" name="sinopsis"  class="form-control">

            <label>officialsite</label>
            <input type="file" name="officialsite" class="form-control"><br>

            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function tm_detail(id_film)
	{
		$.getJSON("<?= base_url()?>index.php/Film/detail/"+id_film,function(data){
			$('#id_film').val(data['id_film']);
			$('#nama_film').val(data['nama_film']);
			$('#harga').val(data['harga']);
			$('#status_film').val(data['status_film']);
      $("#gambar").val(data['gambar']);
		});
	}
</script>