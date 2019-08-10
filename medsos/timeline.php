<?php require_once "classes/auth.php";
      require_once "templates/header.php";
      require_once "classes/config.php";
      require_once "classes/library.php";
 ?>

<br>
  <h2 class="text-center">halaman timeline</h2>
<hr>


<!-- nyapa user -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
        <h3><i class="far fa-address-card"></i> Biodata</h3>
        <hr>
        <img src="img/<?php echo $_SESSION['user']['photo'] ?>" alt="" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-user" style="font-size:24px; color: #3e5499;"></i> <?php echo $_SESSION["user"]["name"] ?></h5>
            <hr>
            <table>
              <tr>
                <td><p class="card-text">email:</p></td>
                <td><?php echo $_SESSION["user"]["email"] ?></td>
              </tr>
              <tr>
                <td><p>Status:</p></td>
              </tr>
            </table>
              <a href="profil.php" class="btn btn-primary"><i class="fas fa-address-card"></i> Edit Profil</a>
              <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Keluar</a>
          </div>
      </div>
    </div>

  <!-- tutup nyapa user -->

  <!-- tempat berbagi cerita -->
      <div class="col-md-5">
        <form class="shadow-lg p-3 mb-5 bg-color-2 rounded" action="classes/proses-upload-cerita.php" method="POST">

          <!-- menampilkan alert jika deskripsi tidak lebih dari 300 kata -->

          <div class="form-groub">
            <label for="judul_cerita">cerita</label>
            <input type="text" name="judul_cerita" value="" class="text-cerita" placeholder="judul cerita" required>
          </div>

          <div class="form-groub">
            <p>ceritanya gimana</p>
            <textarea class="text-cerita" name="deskripsi" rows="8" cols="80" placeholder="gimana ceritanya...? bagikan disini dong" required></textarea><br>
          </div>

          <sub>coming soon</sub>
          <details>
            <div class="form-groub">
              <p><i class="fas fa-book"></i> Genre</p>
              <select name="genre" id="" class="form-control text-cerita">
                <option selected hidden>Pilih</option>
                <option value="">Horror</option>
                <option value="">Misteri</option>
                <option value="">Humor</option>
                <option value="">Sci-Fi / Fiksi Sains</option>
                <option value="">Fiksi</option>
                <option value="">Fan-Fic / Fiksi Penggemar</option>
                <option value="">Petualangan</option>
                <option value="">Sejarah</option>
                <option value="">Other</option>
              </select>
            </div>
            <br>
            <div class="form-groub">
              <p><i class="fas fa-tag"></i> Tag</p>
              <input type="text" name="tag" placeholder="Tag" class="text-cerita">
            </div>
            <div class="form-groub">
              <p><i class="fas fa-bookmark"></i> type cerita</p>
              <select name="genre" id="" class="form-control text-cerita">
                <option selected hidden>Pilih</option>
                <option value="">Daily</option>
                <option value="">Curhatan</option>
                <option value="">Novel</option>
                <option value="">Cerpen</option>
                <option value="">Fiksi</option>
                <option value="">Non fiksi</option>
                <option value="">Tips & Trick</option>
                <option value="">Informasi</option>
                <option value="">Spesial</option>
                <option value="">none</option>
              </select>
            </div>

            <div class="form-groub">
              <p>Sembunyikan cerita atau Bagikan cerita</p>
              <input type="radio" name="" id=""> <i class="fas fa-user-secret"></i> Sembunyikan Cerita<br>
              <input type="radio" name="" id=""> <i class="fas fa-users"></i> Bagikan Cerita  <br>
              <input type="radio" name="" id=""> <i class="far fa-window-close" style="color: red;"></i> Batal <br>
            </div>

            <div class="form-groub">
              <br>
              <p>Bagikan URL</p>
              <input type="url" name="" id="" class="text-cerita">
            </div>
            

          </details>
          <br>
          <div class="form-check">
            <input type="radio" required class="form-check-input"> <i class="fas fa-tasks"></i> check list disini <sup>wajib</sup>
            <p class="form-check-label">*dengan ini anda setuju dengan <a href="aturan.php">Aturan kami</a></p>
          </div>

          <div class="form-groub">
            <input type="text" name="penulis" value="<?php echo $_SESSION["user"]["name"] ?>" class="text-cerita form-control" readonly hidden>
          </div>
          <div class="form-groub">
            <input type="text" name="tanggal" value="<?php echo date("d m Y") ?>" class="text-cerita form-control" readonly hidden>
          </div>
      
            
          <button type="submit" class="btn btn-info" name="addstory" value="bagikan cerita"><i class="fas fa-share"></i> bagikan cerita</button>
          <button type="reset" class="btn btn-danger" name="addstory" value="batal"><i class="far fa-window-close"></i> batal</button>
          
        </form>


    <!-- form status -->
<!-- menampilkan cerita -->
      


      

      </div>

    <!-- ini info -->
    <div class="col mb-5">
      <div class="card">
        <div class="card-body info">
          <ul>
            <li>Pemberitauan</li>
            <details class="info">
              <ul>
                <li>Coming soon</li>
              </ul>
            </details>

            <li><h3>Informasi</h3></li>
            <details class="info">
              <ul>
                <li>hari & Tanggal <br><?php echo date(' D - M - Y'); ?></li>
                <li>Versi web 0.0.1 Beta</li>
                <li>Founder KAG (KRISNA AZIE)</li>
                <li>laporkan jika menemui Bug <a href="feedback.php">Feedback</a></li>
                <li>Spesial Thanks Buat Taman Kode-Kode Jogja dan kawan kawan yang membantu</li>
                <li>hanya menampilkan 15 Cerita terbaru dari semua orang</li>
                <li>next feature, show comment on profil</li>
              </ul>
            </details>
          </ul>
        </div>
      </div>
    </div>
    <!-- tutup ini info -->
    </div>
</div>


<!-- penyambut -->
  <script>
    alert("Selamat Datang Di My story");
  </script>

<!-- tutup tempat berbagi cerita -->

<!-- hasil cerita -->
  <div class="container">
      <?php 
        require "templates/cerita.php";
        require "classes/proses-upload-cerita.php" 
      ?>
  </div>

<?php
if(isset($_GET['delete'])){
  $del = $lib->hapuscerita($_GET['delete']);
}
 ?>

<!-- tutup hasil cerita -->
<?php require_once "templates/footer.php"; ?>
