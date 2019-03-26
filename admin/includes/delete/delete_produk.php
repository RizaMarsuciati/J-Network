<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM produk WHERE kdproduk='$_GET[id]'");

header('location:../../tampil_barang.php');