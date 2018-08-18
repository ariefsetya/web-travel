<?php
  include 'header.php';


$sql  = "SELECT * FROM jenis_penumpang";
$jenis = mysqli_query($koneksi,$sql);

$kota_asal = $_SESSION['kota_asal'];
$kota_tujuan = $_SESSION['kota_tujuan'];

$id = $_GET['id'];

?>
<div class="bgimg-2">
	<div class="container">
		<div style="position:relative;padding-bottom: 200px;">
		  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
		    <form method="POST" action="proses/lanjut.php">
		    	<input type="hidden" name="id" value="<?=$id;?>">
		    	<table class="w3-table">
		    		<?php
		    		for($i=0;$i<$penumpang;$i++){
		    		?>
		    		<tr>
		    			<td colspan="4">Penumpang <?=$i+1;?></td>
		    		</tr>
		    		<tr>
		    			<td>Jenis Penumpang</td>
		    			<td>NIK</td>
		    			<td>Nama</td>
		    			<td>Tanggal Lahir</td>
		    		</tr>
		    		<tr>
		    			<td><select required name="jenis[]" class="w3-select">
		    				<?php foreach($jenis as $row){ ?>
		    				<option value="<?=$row['id'];?>"><?=$row['nama']." ( > ".$row['maks_usia']." tahun )";?></option>
		    			<?php } ?>
		    			</select></td>
		    			<td><input required type="text" class="w3-input" name="nik[]" placeholder="NIK"></td>
		    			<td><input required class="w3-input" type="text" name="nama[]" placeholder="Nama Lengkap"></td>
		    			<td><input required type="text" class="for_date_old w3-input" name="tanggal_lahir[]" placeholder="Tanggal Lahir"></td>
		    		</tr>
		    		<?php } ?>
		    		<tr>
		    			<td colspan="3"></td>
		    			<td>
		    				<button type="submit" class="w3-button w3-blue w3-right">
		    					Lanjutkan
		    				</button>
		    			</td>
		    		</tr>
		    	</table>
		    </form>
		  </div>
		</div>
	</div>
</div>

