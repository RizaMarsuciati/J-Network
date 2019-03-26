<?php
include ("../../../config/koneksi.php");

if (!empty($_FILES['gambar']['name'])) {
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/produk/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	$ubah =	mysqli_query($connect, "UPDATE produk SET gambar = '$gambar' WHERE kdproduk = '$_POST[kdproduk]'");
}

$ubah = mysqli_query($connect,"UPDATE produk SET namaproduk = '$_POST[namaproduk]', hargaproduk = '$_POST[hargaproduk]', ketproduk = '$_POST[ketproduk]', kdkategori = '$_POST[kdkategori]' WHERE kdproduk = '$_POST[kdproduk]'"); 
  if($ubah){      
  header('location:../../tampil_barang.php');
}
else{

  echo "Ada yang error : ".mysqli_error($connect);
} 


