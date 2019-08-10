<?php require_once "./classes/auth.php";
      require_once "./classes/config.php";
      require_once "./classes/library.php";
      $lib = new Library();
      $show = $lib->menampilkancerita();
      while ($data = $show->fetch(PDO::FETCH_OBJ)){
 ?>
<!-- statusnya -->
        <div class="col">
          <div class="">
              <div class="row">
                <div class="col h-auto d-inline-block shadow-lg p-3 mb-5 bg-white rounded">
                  <div class="text-left cerita">
                    <div class="">
                      <?php echo '<h1 class="judul-cerita">'.$data->judul_cerita.'</h1>';?>
                    </div>
                    
                    <div class="deskripsi-cerita text-justify">
                      <p><?php echo '<p>'.$data->deskripsi.'</p>'; ?></p>
                    </div>

                    <!-- dropdown menu -->

                    <div class="text-right pengaturan">

                      <?php 
                        $user = $_SESSION['user']['name'];
                        $dataPenulis = $data->penulis;

                        if ($user == $dataPenulis){
                          echo "<a href='ubah-cerita.php?id=$data->id' class='btn btn-success'><i class='fas fa-edit'></i> Ubah cerita </a> <a href='timeline.php?delete=$data->id' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Hapus </a>";
                        }else{
                          echo "";
                        }

                      ?>
                      
                    </div>

                  <!-- tutup dropdown menu -->

              </div>
                    <!-- meta deskripsi -->
                    <div class="informasi">
                      <h3>Informasi Cerita</h3>
                      <table>
                        <tr>
                          <td>Kode cerita</td>
                          <td><?php echo $data->id; ?></td>
                        </tr>
                        <tr>
                          <td>Penulis</td>
                          <td><?php echo $data->penulis; ?></td>
                        </tr>
                        <tr>
                          <td>Dipublikasikan pada</td>
                          <td><?php echo $data->tanggal; ?></td>
                        </tr>
                        <tr>
                          <td>genre </td>
                          <td>coming soon</td>
                        </tr>
                        <tr>
                          <td>tag </td>
                          <td>coming soon</td>
                        </tr>
                        <tr>
                          <td>type cerita </td>
                          <td>coming soon</td>
                        </tr>
                      </table>
                    <br>
                    <hr>
                    <!-- input komentar netijen -->
                      <?php
                        require_once("classes/config.php");

                        if(isset($_POST['komentar'])){
                          //filter data yang diinputkan
                          $id_users = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
                          $komentar = filter_input(INPUT_POST, 'komentar', FILTER_SANITIZE_STRING);
                          $nama_komentator = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING );
                          $kode_cerita = filter_input(INPUT_POST, 'id_cerita', FILTER_SANITIZE_NUMBER_INT);
                          $judul_cerita = filter_input(INPUT_POST, 'judul_cerita', FILTER_SANITIZE_STRING);
                          $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
                          //menyiapkan query
                          $sql = "INSERT INTO komentar(komentar, id, username, id_cerita, judul_cerita, tanggal)
                                  VALUES (:komentar, :id, :username, :id_cerita, :judul_cerita, :tanggal)";
                                  $stmt = $connect_db->prepare($sql);

                          // bind parameter ke query
                          $params = array(
                                  ":id" => $id_users,
                                  ":komentar" => $komentar,
                                  ":username" => $nama_komentator,
                                  ":id_cerita" => $kode_cerita,
                                  ":judul_cerita" => $judul_cerita,
                                  ":tanggal" => $tanggal
                          );

                                  // eksekusi query untuk menyimpan ke database
                                  $saved = $stmt->execute($params);

                          //jika query simpan berhasil, maka user sudah terdaftar
                          //maka alikan ke halaman login
                          if($saved) header("location: index.php");
                        }
                      ?>




                      <form class="card-body" action="" method="POST">
                        <div class="form-groub">
                          <input type="text"  class="text-cerita form-control" name="" value="<?php echo $_SESSION["user"]["name"] ?>" require readonly hidden>
                        </div>

                        <div class="form-groub">
                          <label for="">Komentar netijen</label>
                          <input type="text"  class="text-cerita form-control" name="komentar" placeholder="Komentar.....">
                        </div>

                        <div class="form-groub">
                          <input type="text" name="tanggal" value="<?php echo date("d m Y") ?>" class="text-cerita form-control" required readonly hidden>
                          <input type="text" name="id_cerita" value="<?php echo $data->id; ?>" placeholder="<?php echo $data->id; ?>" class="text-cerita" required readonly hidden>
                          <input type="text" name="judul_cerita" value="<?php echo $data->judul_cerita; ?>" placeholder="<?php echo $data->judul_cerita; ?>" class="text-cerita form-control" required readonly hidden>
                          <input type="text" name="id" value="<?php echo $_SESSION['user']['id']; ?>" placeholder="<?php echo $_SESSION['user']['id']; ?>" class="text-cerita form-control" required readonly hidden>
                          <input type="text" name="username" value="<?php echo $_SESSION['user']['name']; ?>" placeholder="<?php echo $_SESSION['user']['name']; ?>" class="text-cerita form-control" required readonly hidden>  
                        </div>

                          <button type="submit" name="komentar" class="btn btn-success" value="kirim"><i class="fas fa-paper-plane" style="color: white; font-size: 16px;"></i> kirim</button>
                        
                      </form>

                      <hr><br>
                      <div class="container">
                        <p><i class="fas fa-heart like"></i> Like</p>
                        <p><i class="fas fa-heart-broken like"></i> Dislike</p>
                      </div>

                    </div>

                  </div>
                </div>
          </div>
        </div>

        <?php } ?>
<!-- tutuo statusnya-->
