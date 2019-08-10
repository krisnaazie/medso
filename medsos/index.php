<?php require_once "templates/header.php";
      require_once "classes/library.php";
      require_once "classes/config.php";
      
 ?>

  <section>
    <section class="bg-index-gambar">
    </section>
  </section>

    <div class="container">
      <br>

        <h2 class="text-center"> <strong> My Story </strong> </h2>
        <h3 class="text-center">let's adventure</h3>
      <hr>

<!-- slider -->

  <aside>

    <div class="container">
      <p>sudah punya akun?</p>
      <a href="login.php" class="btn btn-primary">login</a>
    </div>
    <hr>

    <h2 class="text-center">Post Baru</h2>
    <nav>
      <ul>
        <li><a href="#">Post 1</a></li>
        <li><a href="#">Post 2</a></li>
        <ul>
          <li><a href="#">sub post 1</a></li>
          <li><a href="#">sub post 2</a></li>
          <li><a href="#">sub post 3</a></li>
        </ul>
        <li><a href="#">Post 3</a></li>
      </ul>
    </nav>


  </aside>


  <article class="">
    <!-- statusnya -->
            <div class="row w-75 p-3">
              <div class="">
                <?php
                $lib = new Library();
                $show = $lib->menampilkancerita();
                while ($data = $show->fetch(PDO::FETCH_OBJ)){
                      // menampilkan cerita

                ?>
                    <div class="col">
          <div class="">
              <div class="row">
                <div class="col h-auto d-inline-block shadow-lg p-3 mb-5 bg-white rounded">
                  <div class="text-left cerita">
                    <div class="">
                      <?php echo '<h1 class="judul-cerita">'.$data->judul_cerita.'</h1>';?>
                    </div>
                    
                    <div class="deskripsi-cerita">
                      <p><?php echo '<p>'.$data->deskripsi.'</p>'; ?></p>
                    </div>

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
                      </table>
                    <br>
                    <hr>
                      
                    </div>

                  </div>
                </div>
          </div>
        </div>
                <?php } ?>
              </div>
            </div>
    <!-- tutuo statusnya-->
  </article>

<!-- close slider -->
    </div>
<?php require_once "templates/footer.php" ?>
