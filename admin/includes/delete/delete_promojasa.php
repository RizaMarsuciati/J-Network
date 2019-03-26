<?php
include ("../../../config/koneksi.php");
mysqli_query($connect,"DELETE FROM promojasa WHERE kdpromo='$_GET[id]'");

header('location:../../tampil_promojasa.php');