<?php
include '../../koneksi.php';

$nama = $_POST['nama'];
$sql = "INSERT INTO transportasi (nama) VALUES ('".$nama."')";
$res = mysqli_query($koneksi,$sql);

if($res > 0){
	$_SESSION['message'] = " Data Transportasi berhasil disimpan";
	$_SESSION['status'] = "success";
	header("location:../../index.php?m=Transportasi");
}else{
	$_SESSION['message'] = "Data Transportasi gagal disimpan";
	$_SESSION['status'] = "danger";
	header("location:../../index.php?m=Transportasi");
}