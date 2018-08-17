<?php
include '../koneksi.php';

$id = $_GET['id'];
$id_metode = $_GET['metode_id'];

$sql  = "SELECT * FROM metode_pembayaran WHERE id='$id_metode'";
$metode = mysqli_query($koneksi,$sql);
$metode = mysqli_fetch_assoc($metode);

$sql  = "SELECT * FROM transaksi WHERE id='$id'";
$trx = mysqli_query($koneksi,$sql);
$trx = mysqli_fetch_assoc($trx);

$code = generateCode();

$sql  = "UPDATE transaksi SET code='".$code."' WHERE id='$id'";
$transaksi = mysqli_query($koneksi,$sql);

if($metode['konfirmasi']==0){
	$sql  = "INSERT INTO pembayaran (transaksi_id, metode_pembayaran_id, total, status_pembayaran_id, bukti_konfirmasi)
				VALUES ('$id','$id_metode','".$trx['harga_total']."','1','')";
	$transaksi = mysqli_query($koneksi,$sql);
}else{
	$sql  = "INSERT INTO pembayaran (transaksi_id, metode_pembayaran_id, total, status_pembayaran_id, bukti_konfirmasi)
				VALUES ('$id','$id_metode','".$trx['harga_total']."','2','')";
	$transaksi = mysqli_query($koneksi,$sql);
}

if($transaksi){
	header("location:../index.php?m=selesai&id=".$id."&konfirmasi=".$metode['konfirmasi']);
}else{
	header("location:../index.php");
}

?>