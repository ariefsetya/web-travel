<?php
  include 'header.php';


$kota_asal = $_SESSION['kota_asal'];
$kota_tujuan = $_SESSION['kota_tujuan'];

$sql  = "SELECT a.*, b.nama as transportasi FROM rute a 
		LEFT JOIN transportasi b on a.transportasi_id=b.id
		WHERE a.kota_asal_id='$kota_asal' AND a.kota_tujuan_id='$kota_tujuan'";
$rute = mysqli_query($koneksi,$sql);
?>
<div class="bgimg-2">
	<div class="container">
		<div style="position:relative;">
		  <div style="padding-top: 100px;color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		    <table class="w3-table w3-bordered w3-centered">
		    	<tr>
		    		<th>Transportasi</th>
		    		<th>Nama</th>
		    		<th>Jam Berangkat</th>
		    		<th>Jam Tiba</th>
		    		<th>Harga</th>
		    		<th></th>
		    	</tr>
		    	<?php 
		    	while($row = mysqli_fetch_assoc($rute)){
		    	?>
		    	<tr>
		    		<td><?=$row['transportasi'];?></td>	
		    		<td><?=$row['nama'];?></td>	
		    		<td><?=$row['jam_berangkat'];?></td>	
		    		<td><?=$row['jam_tiba'];?></td>	
		    		<td>Rp<?=number_format($row['harga'],0,"",".");?>/pax</td>	
		    		<td><a class="w3-hover-border-blue w3-padding w3-blue" href="proses/pesan.php?id=<?=$row['id'];?>">Pesan</a></td>
		    	</tr>
		    	<?php
		    	}
		    	?>
		    </table>

		  </div>
		</div>
	</div>
</div>
