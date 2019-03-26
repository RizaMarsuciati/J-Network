<?php
include ("../../../config/koneksi.php");

if (!empty($_FILES['gambar']['name'])) {
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/produk/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	$ubah =	mysqli_query($connect, "UPDATE jasa SET gambar = '$gambar' WHERE kdjasa = '$_POST[kdjasa]'");
}

$ubah = mysqli_query($connect,"UPDATE jasa SET namajasa = '$_POST[namajasa]', hargajasa = '$_POST[hargajasa]', ketjasa = '$_POST[ketjasa]', kdkategori = '$_POST[kdkategori]' WHERE kdjasa = '$_POST[kdjasa]'"); 
  if($ubah){      
  header('location:../../tampil_jasa.php');
}
else{

  echo "Ada yang error : ".mysqli_error($connect);
} 


