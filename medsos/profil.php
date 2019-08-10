<?php require_once "classes/auth.php";
      require_once "classes/config.php";
      require_once "classes/library.php";
      require_once "templates/header.php";
 ?>


    <div class="mb-5 p-3 bg-white profil">
      <div class="text-center">
        <img src="img/<?php echo $_SESSION['user']['photo'] ?>" alt="" class="card-img-top gambar-profile">
          <br>
        <?php echo $_SESSION['user']['name']; ?>
          <br>
        <?php echo $_SESSION['user']['email']; ?>
      </div>


        <!-- masih dipikirin mau gimana -->
          <!-- <form action="">
            <div class="form-groub">
              <label for="">status <sup>*beta fitur</sup> </label>
              <input type="text" name="" value="" placeholder="sedang baik baik saja" class="form-control">
            </div>
            <button type="submit" name="" class="btn btn-primary mt-5" value="update"><i class="fas fa-angle-double-up"></i> update </button>
          </form> -->
        <hr>

        
      </div>

      <div class="menu">
            <details>
              <summary>
                <b>komentar</b><br><sup>komentar orang tentang ceritamu</sup>
              </summary>
              coming soon
            </details>

          </div>

      <div class="menu-2">
        <details>
              <summary>
                <b>Ceritamu</b><br><sup>menampilkan semua cerita yang pernah kamu buat</sup> 
              </summary>
              <?php
                $lib = new Library();
                $show = $lib->menampilkancerita();
                while ($data = $show->fetch(PDO::FETCH_OBJ)){
              ?>
              <?php 
                $user = $_SESSION['user']['name'];
                $dataPenulis = $data->penulis;

                if ($user == $dataPenulis){
                  echo "
                      <div class='container'>
                        <h3 class='judul-cerita'>".$data->judul_cerita."</h3>'
                        <br>

                        <details>
                          <p class='deskripsi-cerita mb-5 text-justify'>".$data->deskripsi."</p>
                        </details>

                        <hr><br>
                      </div>                
                  ";
                }else{
                  echo "";
                }

              ?>
              <?php } ?>
            </details>
      </div>

<?php require_once "templates/footer.php"; ?>
