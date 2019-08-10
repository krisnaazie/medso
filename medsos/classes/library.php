<?php
class Library{
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=mystory','root','');
  }
  // db name epiz_24288183_mystory
  //user epiz_24288183
  //sql hostname sql112.epizy.com

  public function addstory($judul_cerita, $deskripsi, $penulis, $tanggal){
    $sql = "INSERT INTO cerita (judul_cerita, deskripsi, penulis, tanggal) VALUES('$judul_cerita', '$deskripsi', '$penulis', '$tanggal')";
    $query = $this->db->prepare($sql);

    if($query->execute()){
      return "berhasil membuat cerita";
    }
    else{
      return "gagal menambahkan cerita";
    }
  }

  public function editcerita($id){
    $sql = "SELECT * FROM cerita WHERE id='$id'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function updatecerita($id, $judul_cerita, $deskripsi){
    $sql = "UPDATE cerita SET judul_cerita='$judul_cerita', deskripsi='$deskripsi' WHERE id='$id'";
    $query = $this->db->query($sql);
    if(!$query){
      return "failed";
    }
    else{
      return "succsess";
    }
  }

  public function menampilkancerita(){
    $sql = "SELECT * FROM cerita ORDER BY id DESC LIMIT 15";
    $query = $this->db->query($sql);
    return $query;
  }
  public function hapusCerita($id){
    $sql = "DELETE FROM cerita WHERE id='$id'";
    $query = $this->db->query($sql);
  }
}

?>
