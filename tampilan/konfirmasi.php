<?php
  include 'header.php';
?>
<div class="bgimg-2">
	<div class="container">
		<div style="position:relative;">
		  <div style="padding-top: 100px;color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		  	<?php
		  	if(isset($_SESSION['message'])){
			if($_SESSION['message']!=""){
			?>
			<div class="w3-panel w3-<?=$_SESSION['status'];?>" role="alert">
			  <h3><?=$_SESSION['title'];?></h3>
			  <p><?=$_SESSION['message'];?></p>
			  <?php $_SESSION['message']="";?>
			</div>
			<?php } } 	?>
		  	<form method="POST" action="proses/konfirmasi.php" enctype="multipart/form-data">
		  	<h2>Konfirmasi Pembayaran</h2>
		  	<table class="w3-table">
		  		<tr>
		  			<td>Kode Booking</td>
		  			<td><input class="w3-input" required type="text" name="code"></td>
		  		</tr>
		  		<tr>
		  			<td>Bukti Pembayaran</td>
		  			<td><input class="w3-input" required type="file" name="bukti"></td>
		  		</tr>
		  		<tr>
		  			<td></td>
		  			<td><button class="w3-button w3-blue" type="submit">Kirim</button></td>
		  		</tr>
		  	</table>
		  	</form>
		  </div>
		</div>
	</div>
</div>
