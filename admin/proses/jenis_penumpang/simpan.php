<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$maks_usia = $_POST['maks_usia'];

$sql = "INSERT INTO jenis_penumpang (nama,maks_usia) VALUES ('".$nama."','".$maks_usia."')";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Jenis Penumpang berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=jenis_penumpang");
}else{
	$_SESSION['message'] = "Data Jenis Penumpang gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=jenis_penumpang");
}