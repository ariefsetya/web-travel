<?php
$id = $_GET['id'];
$sql  = "SELECT * FROM jenis_penumpang WHERE id='".$id."'";
$data = mysqli_query($koneksi,$sql);
$row  = mysqli_fetch_array($data);
?>
<div class="row row-cards">
  <div class="col-12">
	<form method="POST" action="proses/<?=$modul?>/perbarui.php">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ubah Data Jenis Penumpang</h3>
      </div>
      <div class="card-body">
      	<div class="row">
	      	<div class="col-md-12 col-lg-12">
					<div class="form-group">
				      	<label class="form-label">Jenis Penumpang<span class="form-required">*</span></label>
				      	<input name="nama" type="text" class="form-control" value="<?=$row['nama'];?>">
				    </div>
					<div class="form-group">
				      	<label class="form-label">Usia<span class="form-required">*</span></label>
				      	<input name="maks_usia" type="text" class="form-control" value="<?=$row['maks_usia'];?>">
				    </div>
	      	</div>
      	</div>
      </div>
      <div class="card-footer text-right">
		<button type="submit" class="btn btn-primary">Perbarui</button>
	  </div>
    </div>
	</form>
  </div>
</div>