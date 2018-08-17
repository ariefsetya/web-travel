<?php
$id = $_GET['id'];
$sql  = "SELECT * FROM rute WHERE id='".$id."'";
$data = mysqli_query($koneksi,$sql);
$rute  = mysqli_fetch_array($data);

$sql  = "SELECT * FROM transportasi";
$transportasi = mysqli_query($koneksi,$sql);
$sql  = "SELECT * FROM kota";
$kota_asal = mysqli_query($koneksi,$sql);
$kota_tujuan = mysqli_query($koneksi,$sql);
?>
<div class="row row-cards">
  <div class="col-12">
  <form method="POST" action="proses/<?=$modul?>/perbarui.php">
    <input type="hidden" name="id" value="<?=$rute['id'];?>">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Rute</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="form-group">
              <label class="form-label">Transportasi<span class="form-required">*</span></label>
              <select required name="transportasi_id" class="form-control">
                <option value="">Pilih Transportasi</option>
                <?php while($row = mysqli_fetch_assoc($transportasi)){ ?>
                <option <?=$row['id']==$rute['transportasi_id']?"selected":"";?> value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Kota Asal<span class="form-required">*</span></label>
              <select required name="kota_asal_id" class="form-control">
                <option value="">Pilih Kota</option>
                <?php while($row = mysqli_fetch_assoc($kota_asal)){ ?>
                <option <?=$row['id']==$rute['kota_asal_id']?"selected":"";?> value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Kota Tujuan<span class="form-required">*</span></label>
              <select required name="kota_tujuan_id" class="form-control">
                <option value="">Pilih Kota</option>
                <?php while($row = mysqli_fetch_assoc($kota_tujuan)){ ?>
                <option <?=$row['id']==$rute['kota_tujuan_id']?"selected":"";?> value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Nama<span class="form-required">*</span></label>
              <input required name="nama" type="text" class="form-control" value="<?=$rute['nama'];?>">
            </div>
            <div class="form-group">
              <label class="form-label">Jam Berangkat<span class="form-required">*</span></label>
              <input required name="jam_berangkat" type="time" value="<?=$rute['jam_berangkat'];?>" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-label">Jam Tiba<span class="form-required">*</span></label>
              <input required name="jam_tiba" type="time" value="<?=$rute['jam_tiba'];?>" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-label">Harga<span class="form-required">*</span></label>
              <input required name="harga" type="number" min="0" value="<?=$rute['harga'];?>" class="form-control">
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