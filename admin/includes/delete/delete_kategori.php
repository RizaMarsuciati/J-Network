<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM kategori WHERE kdkategori='$_GET[id]'");

header('location:../../tampil_kategori.php');
