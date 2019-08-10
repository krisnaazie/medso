<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "mystory";


/*
koneksi database dengan PDO
*/
  try{
  //membuat koneki PDO
  //    $connect_db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
   $connect_db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
   }catch(PDOException $e){
     //menujukan jika error
     die("Terjadi Masalah: ". $e->getMassage());
  }

/*
koneksi database dengan Prosedural
*/
//   $connect_db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
//
// // Check connection
// if (mysqli_connect_errno())
//   {
//   die("Failed \to connect to MySQL: " . mysqli_connect_error());
//   }
//  ?>
