<?php
$_SESSION['kota_asal'] = "";
$_SESSION['kota_tujuan'] = "";
$_SESSION['tanggal'] = "";
$_SESSION['penumpang'] = "";
  include 'header.php';

$id = $_GET['id'];
$konfirmasi = $_GET['konfirmasi'];

$sql  = "SELECT a.*, b.nama as kota_asal, c.nama as kota_tujuan, d.nama as transportasi 
			FROM transaksi a 
			LEFT JOIN kota b ON a.kota_asal_id = b.id
			LEFT JOIN kota c ON a.kota_tujuan_id = c.id
			LEFT JOIN transportasi d ON a.transportasi_id = d.id
			WHERE a.id='$id'";
$transaksi = mysqli_query($koneksi,$sql);
$transaksi = mysqli_fetch_assoc($transaksi);

$sql  = "SELECT a.*, b.nama as jenis_penumpang 
			FROM penumpang a 
			LEFT JOIN jenis_penumpang b ON a.jenis_penumpang_id = b.id
			WHERE a.transaksi_id='$id'";
$penumpang = mysqli_query($koneksi,$sql);
?>
<div class="bgimg-2">
	<div class="container">
		<div style="position:relative;">
		  <div style="padding-top: 100px;color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		  	<h2>Proses Pemesanan Selesai</h2>
		  	<?php
		  	if($konfirmasi==0){
		  		?>
		  		<p><b>Silahkan melakukan pembayaran di loket pembayaran</b></p>
		  		<?php
		  	}else{
		  		?>
		  		<p><b>Silahkan melakukan konfirmasi pembayaran <a href="index.php?m=konfirmasi">disini</a></b></p>
		  		<?php
		  	}
		  	?>
		  	<h4>Kode Booking : <b><?=$transaksi['code'];?></b></h4>
		  	<b>Detail Transaksi</b>
		  	<table class="w3-table">
		  		<tr>
		  			<td>Transportasi</td>
		  			<td><?=$transaksi['transportasi'];?></td>
		  		</tr>
		  		<tr>
		  			<td>Nama</td>
		  			<td><?=$transaksi['nama'];?></td>
		  		</tr>
		  		<tr>
		  			<td>Kota Asal</td>
		  			<td><?=$transaksi['kota_asal'];?></td>
		  		</tr>
		  		<tr>
		  			<td>Kota Tujuan</td>
		  			<td><?=$transaksi['kota_tujuan'];?></td>
		  		</tr>
		  	</table>
		  	<b>Detail Penumpang</b>
		  	<table class="w3-table">
		  		<tr>
		  			<th>Jenis Penumpang</th>
		  			<th>NIK</th>
		  			<th>Nama</th>
		  			<th>Tanggal Lahir</th>
		  		</tr>
		  		<?php
		  		foreach ($penumpang as $key) {
		  		?>
		  		<tr>
		  			<td><?=$key['jenis_penumpang'];?></td>
		  			<td><?=$key['nik'];?></td>
		  			<td><?=$key['nama'];?></td>
		  			<td><?=$key['tanggal_lahir'];?></td>
		  		</tr>
		  		<?php } ?>
		  	</table>
		  </div>
		</div>
	</div>
</div>
