<?php
include ("../config/koneksi.php");
$kdproduk = $_GET['kdproduk'];
$query = mysqli_query($connect, "SELECT  * FROM produk where kdproduk='$kdproduk'");
$transaksi = mysqli_fetch_array($query);
$data=array(
'kd' => $transaksi['kdproduk'],
'hargaproduk' => $transaksi['hargaproduk'],);


echo json_encode($data);
?>