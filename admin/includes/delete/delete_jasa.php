<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM jasa WHERE kdjasa='$_GET[id]'");

header('location:../../tampil_jasa.php');