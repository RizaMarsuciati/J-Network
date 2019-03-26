<?php
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/produk/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	include ("../../../config/koneksi.php");
	
	$sql="INSERT INTO produk (namaproduk, hargaproduk, ketproduk, gambar, kdkategori)VALUES";
	$sql.="('".$_POST['namaproduk']."','".$_POST['hargaproduk']."','".$_POST['ketproduk']."','".$gambar."','".$_POST['kdkategori']."')";
	
	mysqli_query($connect, $sql) or exit ("Error query : ".$sql);

	header('location:../../tampil_barang.php');