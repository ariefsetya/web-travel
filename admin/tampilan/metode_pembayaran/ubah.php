<?php
$id = $_GET['id'];
$sql  = "SELECT * FROM metode_pembayaran WHERE id='".$id."'";
$data = mysqli_query($koneksi,$sql);
$row  = mysqli_fetch_array($data);
?>
<div class="row row-cards">
  <div class="col-12">
	<form method="POST" action="proses/<?=$modul?>/perbarui.php">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ubah Data Metode Pembayaran</h3>
      </div>
      <div class="card-body">
      	<div class="row">
	      	<div class="col-md-12 col-lg-12">
					<div class="form-group">
				      	<label class="form-label">Nama<span class="form-required">*</span></label>
				      	<input name="nama" type="text" class="form-control" value="<?=$row['nama'];?>">
				    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi<span class="form-required">*</span></label>
                        <label class="custom-switch">
                          <input type="checkbox" name="konfirmasi" class="custom-switch-input"  value="1" <?php echo $row['konfirmasi'] == 1 ?"checked":"";?>>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Aktifkan metode pembayaran ini</span>
                        </label>
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