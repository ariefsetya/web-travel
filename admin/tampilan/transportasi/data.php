<?php
$sql 	= "SELECT * FROM Transportasi";
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
        <h3 class="card-title">Data Transportasi</h3>
        <a href="index.php?m=Transportasi&p=tambah" class="btn btn-primary ml-auto text-white">Tambah Data</a>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap">
          <thead>
            <tr>
              <th class="text-center">Nama Transportasi</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
  			<?php
  			while ($key = mysqli_fetch_array($data)) {
  			?>
            <tr>
              <td><?=$key['nama'];?></td>
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