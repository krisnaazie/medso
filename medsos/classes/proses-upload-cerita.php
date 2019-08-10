<?php
require_once "auth.php";
require_once "library.php";

if(isset($_POST['addstory'])){
  $judul_cerita = $_POST['judul_cerita'];
  $deskripsi = $_POST['deskripsi'];
  $penulis = $_POST['penulis'];
  $tanggal = $_POST['tanggal'];

  $lib = new Library();
  $add = $lib->addstory($judul_cerita, $deskripsi, $penulis, $tanggal);
  if($add == "berhasil membuat cerita"){
    header('location: /medsos/timeline.php');
  }else{
    die($add);
  }
}

 ?>
