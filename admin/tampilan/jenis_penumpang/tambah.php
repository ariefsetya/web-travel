<div class="row row-cards">
  <div class="col-12">
	<form method="POST" action="proses/<?=$modul?>/simpan.php">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Jenis Penumpang</h3>
      </div>
      <div class="card-body">
      	<div class="row">
	      	<div class="col-md-12 col-lg-12">
					<div class="form-group">
				      	<label class="form-label">Jenis Penumpang<span class="form-required">*</span></label>
				      	<input name="nama" type="text" class="form-control">
				      	<label class="form-label">Usia<span class="form-required">*</span></label>
				      	<input name="maks_usia" type="text" class="form-control">
				    </div>
			</div>
      	</div>
      </div>
      <div class="card-footer text-right">
		<button type="submit" class="btn btn-primary">Simpan</button>
	  </div>
    </div>
	</form>
  </div>
</div>