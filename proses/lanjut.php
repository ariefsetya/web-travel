<?php

include '../koneksi.php';

$id = $_POST['id'];

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$jenis = $_POST['jenis'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$insert = 0;
for($i = 0;$i<sizeof($nama);$i++) {
	$sql = "INSERT INTO penumpang (transaksi_id, jenis_penumpang_id, nik, nama, tanggal_lahir) 
			VALUES ('$id','".$jenis[$i]."','".$nik[$i]."','".$nama[$i]."','".$tanggal_lahir[$i]."')";
	$insert = mysqli_query($koneksi,$sql);
}

if($insert){
	header("location: ../index.php?m=pembayaran&id=".$id);
}else{
	header("location: ../index.php");
}