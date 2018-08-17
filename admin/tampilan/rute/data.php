<?php
$sql 	= "SELECT a.id, d.nama as transportasi, b.nama as kota_asal, c.nama as kota_tujuan, a.nama, a.harga, a.jam_berangkat, a.jam_tiba FROM rute a
          LEFT JOIN kota b on a.kota_asal_id=b.id
          LEFT JOIN kota c on a.kota_tujuan_id=c.id
          LEFT JOIN transportasi d on a.transportasi_id=d.id";
$data 	= mysqli_query($koneksi,$sql);
if(isset($_SESSION['message'])){
if($_SESSION['message']!=""){
?>
<div class="alert alert-<?=$_SESSION['status'];?>" role="alert">
  <?=$_SESSION['message'];?>
  <?php $_SESSION['message']="";?>
</div>
<?php } } 	?>
<div class="row row-cards">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Rute</h3>
        <a href="index.php?m=rute&p=tambah" class="btn btn-primary ml-auto text-white">Tambah Data</a>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap">
          <thead>
            <tr>
              <th class="text-center">Transportasi</th>
              <th class="text-center">Kota Asal</th>
              <th class="text-center">Kota Tujuan</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Jam Berangkat</th>
              <th class="text-center">Jam Tiba</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
  			<?php
  			while ($key = mysqli_fetch_array($data)) {
  			?>
            <tr>
              <td><?=$key['transportasi'];?></td>
              <td><?=$key['kota_asal'];?></td>
              <td><?=$key['kota_tujuan'];?></td>
              <td><?=$key['nama'];?></td>
              <td><?=$key['jam_berangkat'];?></td>
              <td><?=$key['jam_tiba'];?></td>
              <td><?=$key['harga'];?></td>
              <td class="text-center">
                <a href="index.php?m=<?=$modul;?>&p=ubah&id=<?=$key['id'];?>" class="btn btn-secondary bg-warning btn-sm">Edit</a>
                <a href="proses/<?=$modul;?>/hapus.php?id=<?=$key['id'];?>" class="btn btn-secondary bg-danger text-white btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?=$key['nama'];?>')">Delete</a>
              </td>
            </tr>
        	<?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>