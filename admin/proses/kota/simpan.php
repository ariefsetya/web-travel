<?php
include '../../koneksi.php';

$nama = $_POST['nama'];

$sql = "INSERT INTO kota (nama) VALUES ('".$nama."')";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = "Data Kota berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=kota");
}else{
	$_SESSION['message'] = "Data Kota gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=kota");
}