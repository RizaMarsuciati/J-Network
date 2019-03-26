<?php
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/jasa/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO jasa (namajasa, hargajasa, ketjasa, gambar, kdkategori)VALUES";
	$sql.="('".$_POST['namajasa']."','".$_POST['hargajasa']."','".$_POST['ketjasa']."','".$gambar."','".$_POST['kdkategori']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	header('location:../../tampil_jasa.php');