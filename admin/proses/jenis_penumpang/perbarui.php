-<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$maks_usia = $_POST['maks_usia'];
$id = $_POST['id'];

$sql = "UPDATE jenis_penumpang SET nama='".$nama."', maks_usia='".$maks_usia."' WHERE id='".$id."'";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Jenis Penumpang berhasil diperbarui";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=jenis_penumpang");
}else{
	$_SESSION['message'] = "Data Jenis Penumpang gagal diperbarui";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=jenis_penumpang");
}