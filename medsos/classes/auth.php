<?php
//berfungsi untuk mengecek session, apakah user sudah login atau belum
  session_start();
  if(!isset($_SESSION["user"])) header("location: login.php");
 ?>
