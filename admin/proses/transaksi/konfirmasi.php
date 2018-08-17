<?php

include '../../koneksi.php';

$id = $_GET['id'];
$id_trans = $_GET['id_trans'];

$sql = "UPDATE pembayaran SET status_pembayaran_id='4' WHERE transaksi_id='$id'";
$res = mysqli_query($koneksi,$sql);

if($res){
	$_SESSION['status'] = "success";
	$_SESSION['message'] = "Pesanan #".$id." berhasil dikonfirmasi pembayaran";
}else{
	$_SESSION['status'] = "danger";
	$_SESSION['message'] = "Pesanan #".$id." gagal dikonfirmasi pembayaran";
}
header("location:../../index.php?m=transaksi&p=list&id=".$id_trans);
