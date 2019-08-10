<?php
  require_once "classes/config.php";
  require_once "classes/auth.php";

  if(isset($_GET['id'])){
    //ambil id dari query String
    $id = $_GET['id'];

    //buat query hapus
    $sql_hapus = "DELETE FROM cerita WHERE id=$id";
    $query_hapus = mysqli_query($db, $sql);

    //apakah query hapus berhasil?
    if($query_hapus){
      header('Location: timeline.php');
    }else{
      die("gagal menghapus...");
    }

  }else{
    die("akses dilarang...");
  }
 ?>
