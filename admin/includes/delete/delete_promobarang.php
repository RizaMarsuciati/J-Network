<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM promo WHERE kdpromo='$_GET[id]'");

header('location:../../tampil_promo.php');