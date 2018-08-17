<?php
include '../../koneksi.php';

$id = $_POST['id'];

$transportasi_id = $_POST['transportasi_id'];
$kota_asal_id = $_POST['kota_asal_id'];
$kota_tujuan_id = $_POST['kota_tujuan_id'];
$nama = $_POST['nama'];
$jam_berangkat = date_format(date_create($_POST['jam_berangkat']),"H:i:s");
$jam_tiba = date_format(date_create($_POST['jam_tiba']),"H:i:s");
$harga = $_POST['harga'];

$sql = "UPDATE rute SET 
			transportasi_id='".$transportasi_id."',
			kota_asal_id='".$kota_asal_id."',
			kota_tujuan_id='".$kota_tujuan_id."',
			nama='".$nama."',
			jam_berangkat='".$jam_berangkat."',
			jam_tiba='".$jam_tiba."'
			WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Rute berhasil diperbarui";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=rute");
}else{
	$_SESSION['message'] = "Data Rute gagal diperbarui";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=rute");
}