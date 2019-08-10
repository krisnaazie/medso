<?php require_once "templates/header.php"; ?>

<?php

 require_once("classes/config.php");

 if(isset($_POST['login'])){

   $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
   $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

   $sql = "SELECT * FROM users WHERE username=:username or email=:email";
   $stmt = $connect_db->prepare($sql);

   //bind parameter ke HttpQueryString
   // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

   $stmt->execute($params);
   if(!$stmt){
     echo("tidak di set, data: " . json_encode($_POST));
   }

   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   //jika user terdaftar
   if($user){
     //verifikasi password
     if(password_verify($password, $user["password"])){
       //buat session
       session_start();
       $_SESSION["user"] = $user;
       //login sukses, alihkan ke halaman timeline
       header("location: timeline.php");
     }
   }
 }
?>
<!-- content -->
 
  <!-- background -->
  <div class="bg-login"><img src="images/729.jpg" alt="Bacground Page Login"></div>


 <div class="circle-icon"><i class="fa fa-user" aria-hidden="true"></i></div>

  <div class="container">
    <div class="box-login shadow-lg p-3 mb-5 rounded">
      <form class="card-body" action="" method="post">
        <h2>Halamana login</h2>

        <hr>

        <div class="form-group">
          <label for="username">username atau email</label>
          <input type="text" name="username" value="" class="form-control" placeholder="username atau emails" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="" class="form-control" placeholder="password" required>
        </div>

        <div class="form-group">
          <input type="submit" name="login" value="masuk" class="btn btn-primary">
          <input type="reset" name="" value="reset" class="btn btn-outline-danger">
        </div>
        
        <p class="text-center">belom punya <a href="register.php">akun?</a> </p>

      </form>
    </div>
  </div>

<!-- tutup content -->
<?php require_once "templates/footer.php"; ?>
