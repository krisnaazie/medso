<?php
    require_once "templates/header.php";
    require_once "classes/auth.php";
    require_once "classes/config.php";
    require_once "classes/library.php";

    if(isset($_GET['id'])){
        $lib = new Library();
        $cerita = $lib->editcerita($_GET['id']);
        $edit = $cerita->fetch(PDO::FETCH_OBJ);
        echo '
        <br>
        <div class="container card mb-5 p-3 w-75">
            <div class="alert alert-warning p-3 mb-5 shadow-lg">Maintance</div>
            <h2>Halaman Ubah cerita</h2>        
            <h3>Ubah Data Buku</h3>

            <form action="ubah-cerita.php" method="POST" class="form-group">
                Kode Buku: <input type="text" name="id" value="'.$edit->id.'" class="form-control" readonly><br>
                Judul Buku: <input type="text" name="judul_cerita" value="'.$edit->judul_cerita.'" class="form-control"><br>
                Cerita: <textarea class="text-cerita" name="deskripsi" rows="8" cols="80" required>'.$edit->deskripsi.'</textarea>
                <button type="submit" name="updatecerita" value="Update" class="btn btn-info"><i class="fas fa-angle-double-up"></i> update </button>
            </form>
        </div>
        ';
    }


    if(isset($_POST['updatecerita'])){
    $id = $_POST['id'];
    $judul_cerita = $_POST['judul_cerita'];
    $deskripsi = $_POST['deskripsi'];
    
    $lib = new Library();
    $upd = $lib->updatecerita($id, $judul_cerita, $deskripsi);
    if($upd == "Success"){
        header('location: /medsos/timeline.php');
        }else{
            echo "<br>
                    <div class='container jumbotron mb-5' style='margin-top:15vh;'>
                        <div class='alert alert-success text-center'>    
                            <h2>Success</h2>
                                
                            <hr>
                                anda berhasil menggubah cerita
                            <br><br>
                            <a href='timeline.php' class='btn btn-info'> kembali </a>
                        </div>
                    </div>
                ";
        }
    }

?>



<?php
    require_once "templates/footer.php";
?>