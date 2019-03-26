<?php
session_start();
include ("../../../config/koneksi.php");

if (!empty($_FILES['gambar']['name'])) {
	$gambar = rand(1000,100000)."-".$_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	$folder="../../assets/img/uploads/promo/";
	move_uploaded_file($lokasi,$folder.$gambar); 

	$ubah =	mysqli_query($connect, "UPDATE promojasa SET gambar = '$gambar' WHERE kdpromo = '$_POST[kdpromo]'");
}

$ubah = mysqli_query($connect,"UPDATE promojasa SET namapromo = '$_POST[namapromo]', jenispromo = '$_POST[jenis]', nama = '$_POST[kdjasa]',kdjasa = '$_POST[kd]', harga = $_POST[hargajasa], hargapromo = $_POST[hargapromo], tglmulai = '$_POST[tglmulai]', tglakhir = '$_POST[tglakhir]', kduser = '$_SESSION[kduser]' WHERE kdpromo = '$_POST[kdpromo]'"); 
  if($ubah){      
  header('location:../../tampil_promojasa.php');
}
else{

  echo "Ada yang error : ".mysqli_error($connect);
} 


