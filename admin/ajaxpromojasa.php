<?php
include ("../config/koneksi.php");
$kdjasa = $_GET['kdjasa'];
$query = mysqli_query($connect, "SELECT  * FROM jasa where kdjasa='$kdjasa'");
$transaksi = mysqli_fetch_array($query);
$data=array(
'kd' => $transaksi['kdjasa'],
'hargajasa' => $transaksi['hargajasa'],);


echo json_encode($data);
?>