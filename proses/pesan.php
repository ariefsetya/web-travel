<?php
include '../koneksi.php';

$id_rute = $_GET['id'];

$sql  = "SELECT * FROM rute WHERE id='$id_rute'";
$rute = mysqli_query($koneksi,$sql);
$rute = mysqli_fetch_assoc($rute);

$tanggal = $_SESSION['tanggal'];
$penumpang = $_SESSION['penumpang'];

$harga_satuan = $rute['harga'];
$harga_total = $harga_satuan*$penumpang;

$id = date("y").$rute['transportasi_id'].str_pad($rute['kota_asal_id'], 2, '0', STR_PAD_LEFT).str_pad($rute['kota_tujuan_id'], 2, '0', STR_PAD_LEFT).rand(100,999);

$sql  = "INSERT INTO transaksi (id, user_id, transportasi_id, kota_asal_id, kota_tujuan_id, nama, tanggal, jumlah_penumpang, harga_satuan, harga_total)
			VALUES ('$id','1','".$rute['transportasi_id']."','".$rute['kota_asal_id']."','".$rute['kota_tujuan_id']."','".$rute['nama']."','$tanggal','$penumpang','$harga_satuan','$harga_total')";
$transaksi = mysqli_query($koneksi,$sql);

if($transaksi){
	header("location:../index.php?m=pemesanan&id=".mysqli_insert_id($koneksi));
}else{
	header("location:../index.php");
}

?>