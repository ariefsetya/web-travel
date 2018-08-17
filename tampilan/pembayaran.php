<?php
  include 'header.php';

$id = $_GET['id'];

$sql  = "SELECT * FROM metode_pembayaran";
$bayar = mysqli_query($koneksi,$sql);

$sql  = "SELECT * FROM transaksi WHERE id='$id'";
$transaksi = mysqli_query($koneksi,$sql);
$transaksi = mysqli_fetch_assoc($transaksi);
?>
<div class="bgimg-2">
	<div class="container">
		<div style="position:relative;padding-bottom: 200px;">
		  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		    <table class="w3-table w3-bordered w3-centered">
		    	<tr>
		    		<td>Metode Pembayaran</td>
		    		<td>Harga Total</td>
		    		<td></td>
		    	</tr>
		    	<?php 
		    	while($row = mysqli_fetch_assoc($bayar)){
		    	?>
		    	<tr>
		    		<td><?=$row['nama'];?></td>	
		    		<td>Rp<?=number_format($transaksi['harga_total'],0,"",".");?></td>	
		    		<td><a class="w3-hover-border-blue w3-padding w3-blue" href="proses/bayar.php?id=<?=$id;?>&metode_id=<?=$row['id'];?>">Bayar</a></td>
		    	</tr>
		    	<?php
		    	}
		    	?>
		    </table>
		  </div>
		</div>
	</div>
</div>

