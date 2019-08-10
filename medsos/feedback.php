<?php require_once "classes/auth.php";
      require_once "templates/header.php";
      require_once "classes/config.php";
      require_once "classes/library.php";
 ?>
<?php

  require_once("classes/config.php");

  if(isset($_POST['feedback'])){
    //filter data yang diinputkan
    $id_users = filter_input(INPUT_POST, 'id_users', FILTER_SANITIZE_NUMBER_INT);
    $nama_bug = filter_input(INPUT_POST, 'nama_bug', FILTER_SANITIZE_STRING);
    $deskripsi_bug = filter_input(INPUT_POST, 'deskripsi_bug', FILTER_SANITIZE_STRING );
    $pengirim = filter_input(INPUT_POST, 'pengirim', FILTER_SANITIZE_STRING);
    //menyiapkan query
    $sql = "INSERT INTO feedback (id_users, pengirim, nama_bug, deskripsi_bug)
            VALUES (:id_users, :pengirim, :nama_bug, :deskripsi_bug)";
            $stmt = $connect_db->prepare($sql);

    // bind parameter ke query
    $params = array(
            ":id_users" => $id_users,
            ":pengirim" => $pengirim,
            ":nama_bug" => $nama_bug,
            ":deskripsi_bug" => $deskripsi_bug
    );

            // eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);

    //jika query simpan berhasil, maka user sudah terdaftar
    //maka alikan ke halaman login
    if($saved) header("location: timeline.php");
  }
 ?>
 
    <br><br>
    <div class="container card mb-5 p-3 w-75 shadow-lg">

        <h2>Feedback</h2>

        <form class="card-body" action="" method="POST">
            <div class="form-groub">
                <p>Laporkan Bug, Yang Melanggar aturan, Meminta fitur baru, kritik dan saran untuk devoloper dsb</p>
                <input type="text" name="nama_bug" value="" placeholder="Laporkan Bug atau meminta fitur baru" class="text-cerita" required>
            </div>
            
            <div class="form-groub">
                <textarea name="deskripsi_bug" id="" cols="30" rows="10" class="text-cerita" required placeholder="Deskripsi : ...."></textarea>
                <p>*jika melaporkann ada yang melanggar aturan silakan cantumkan id user tersebut</p>
            </div>

            <div class="form-groub">
                <input type="text" name="id_users" value="<?php echo $_SESSION['user']['id']; ?>" placeholder="<?php echo $_SESSION['user']['id']; ?>" class="text-cerita" required readonly hidden>
                <input type="text" name="pengirim" value="<?php echo $_SESSION['user']['name']; ?>" placeholder="<?php echo $_SESSION['user']['name']; ?>" class="text-cerita" required readonly hidden>
            </div>

            <!-- <div class="form-groub">
                <p>Sertakan Bukti Agar Cepat Kami Proses :) <sup>*coming soon</sup></p>
                <input type="file" class="form-control-file"><br>
            </div> -->

            <input type="submit" class="btn btn-danger" name="feedback" value="feedback">
        </form>

    </div>

 <?php require_once "templates/footer.php"; ?>