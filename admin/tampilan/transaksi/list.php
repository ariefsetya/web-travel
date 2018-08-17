<?php
$id = $_GET['id'];

$sql = "SELECT * FROM transportasi WHERE id='$id'";
$trans = mysqli_query($koneksi,$sql);
$trans = mysqli_fetch_assoc($trans);

$sql = "SELECT a.*,b.nama as kota_asal, c.nama as kota_tujuan,
          coalesce(f.id,0) as status_pembayaran_id,
          coalesce(e.nama, '') as metode_pembayaran,
          coalesce(f.nama, 'Belum Diproses Ke Pembayaran') as status_pembayaran,
          coalesce(d.bukti_konfirmasi,0) as bukti_konfirmasi
          FROM transaksi a
          LEFT JOIN kota b on a.kota_asal_id=b.id
          LEFT JOIN kota c on a.kota_tujuan_id=c.id
          LEFT JOIN pembayaran d on a.id=d.transaksi_id
          LEFT JOIN metode_pembayaran e on e.id=d.metode_pembayaran_id
          LEFT JOIN status_pembayaran f on f.id=d.status_pembayaran_id
          WHERE a.transportasi_id='$id'
          ORDER BY created_date desc";
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
        <h3 class="card-title">Data Transaksi <?=$trans['nama'];?></h3>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap">
          <thead>
            <tr>
              <th class="text-center">Detail Pesanan</th>
              <th class="text-center">Data Penumpang</th>
              <th class="text-center">Data Pembayaran</th>
            </tr>
          </thead>
          <tbody>
  			<?php
  			while ($key = mysqli_fetch_array($data)) {
          $sql  = "SELECT a.*, b.nama as jenis_penumpang 
                    FROM penumpang a 
                    LEFT JOIN jenis_penumpang b ON a.jenis_penumpang_id = b.id
                    WHERE a.transaksi_id='".$key['id']."'";
          $penumpang = mysqli_query($koneksi,$sql);
  			?>
            <tr>
              <td>
                ID: <b><?=$key['id'];?></b><br>
                Kode Booking: <b><?=$key['code'];?></b><br>
                Kota Asal:<br><b><?=$key['kota_asal'];?></b><br>
                Kota Tujuan:<br><b><?=$key['kota_tujuan'];?></b><br>
                Nama:<br><b><?=$key['nama'];?></b>
              </td>
              <td class="text-center">
                <?php
                if(mysqli_num_rows($penumpang)>0){
                ?>
                <table class="table">
                  <tr>
                    <th>Jenis Penumpang</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                  </tr>
                  <?php
                  foreach ($penumpang as $row) {
                  ?>
                  <tr>
                    <td><?=$row['jenis_penumpang'];?></td>
                    <td><?=$row['nik'];?></td>
                    <td><?=$row['nama'];?></td>
                    <td><?=$row['tanggal_lahir'];?></td>
                  </tr>
                  <?php } ?>
                </table>
              <?php }else{
                echo "Tidak ada data";
              } ?>
              </td>
              <td class="text-center">
                <?php
                echo $key['metode_pembayaran']."<br>";
                if(mysqli_num_rows($penumpang)>0){
                  if($key['status_pembayaran_id'] == 3){?>
                  <a target="_blank" href="../<?=$key['bukti_konfirmasi'];?>"><img src="../<?=$key['bukti_konfirmasi'];?>" style="max-width: 50px;max-width: 50px;"></a><br><br>
                  <a href="proses/<?=$modul;?>/konfirmasi.php?id=<?=$key['id'];?>&id_trans=<?=$key['transportasi_id'];?>" class="btn btn-primary bg-info">Konfirmasi Pembayaran</a>
              <?php }else if($key['status_pembayaran_id']<4){
                        echo "<b>".$key['status_pembayaran']."</b>";
                        ?><br><br>
                        <a href="proses/<?=$modul;?>/konfirmasi.php?id=<?=$key['id'];?>&id_trans=<?=$key['transportasi_id'];?>" class="btn btn-primary bg-info">Konfirmasi Pembayaran</a>
                        <?php
                      }else{
                        echo "<b class='badge badge-success'>".$key['status_pembayaran']."</b>";
                      } 
                  }else{
                    echo "Tidak ada data";
                  } ?>
              </td>
            </tr>
        	<?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>