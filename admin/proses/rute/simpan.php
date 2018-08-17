<?php
include '../../koneksi.php';

$transportasi_id = $_POST['transportasi_id'];
$kota_asal_id = $_POST['kota_asal_id'];
$kota_tujuan_id = $_POST['kota_tujuan_id'];
$nama = $_POST['nama'];
$jam_berangkat = date_format(date_create($_POST['jam_berangkat']),"H:i:s");
$jam_tiba = date_format(date_create($_POST['jam_tiba']),"H:i:s");
$harga = $_POST['harga'];

$sql = "INSERT INTO rute (transportasi_id, kota_asal_id, kota_tujuan_id, nama, jam_berangkat, jam_tiba, harga) VALUES ('".$transportasi_id."','".$kota_asal_id."','".$kota_tujuan_id."','".$nama."','".$jam_berangkat."','".$jam_tiba."','".$harga."')";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Rute berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=rute");
}else{
	$_SESSION['message'] = "Data Rute gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=rute");
}