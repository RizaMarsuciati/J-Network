<?php

	session_start();

	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/promo/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO promojasa (kdpromo, namapromo, jenispromo, tglmulai, tglakhir, kdjasa, nama, harga, hargapromo, gambar, kduser)VALUES";
	$sql.="('','".$_POST['namapromo']."','".$_POST['jenis']."','".$_POST['tglmulai']."','".$_POST['tglakhir']."','".$_POST['kd']."','".$_POST['kdjasa']."',".$_POST['hargajasa'].",".$_POST['hargapromo'].",'".$gambar."','".$_SESSION['kduser']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	header('location:../../tampil_promojasa.php');