<?php
include ("../../../config/koneksi.php");

$ubah = mysqli_query($connect,"UPDATE kategori SET namakategori = '$_POST[namakategori]' WHERE kdkategori = '$_POST[kdkategori]'"); 
  if($ubah){      

	header('location:../../tampil_kategori.php');
}
else{

  echo "Ada yang error : ".mysql_error();
}
