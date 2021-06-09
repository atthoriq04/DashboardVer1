
<?php require_once('../template/Dasheader.php')?>
<?php
    require "proses.php";
    $id = $_GET["id"];

    // Memproses Perubahan data yang dilakukan dalam file Proses.php
    $buku = querytampil("SELECT * FROM databuku WHERE id = $id")[0];
    if(isset($_POST["ubah"]) ){

        if(ubah($_POST) >0){
            echo "<script>alert('Data berhasil diubah');
            document.location.href= 'DATA.php';
            </script>";
        }else{
            echo "<script>alert('Data gagal diubah')
            </script>";
        }

    }
?>
     <?php
       session_start();
            if(isset( $_SESSION["User"])){ ?>
        <?php }else{
            header('location:../index.php');
        } ?> 
        

        <!-- Form Ubah Data  -->
        <h1 class="mt-3">Ubah Data</h1>
        <hr>
        
        <section>
            <div class="container mt-3 pt-3">
                <div class="row  justify-content-center">
                    <div class="col-sm-10">
                        <form action="" Method="POST">
                            <input type="hidden" name="id" value="<?= $buku["id"]; ?>" autocomplete="off">
                            <div class="form-gorup">
                                <label for="Judul">Judul Buku</label>
                                <input class="form-control"type="text" name="judul" id="Judul" value="<?= $buku["judulbuku"]; ?>" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="penulis">Nama Penulis</label>
                                <input class="form-control" type="text" name="penulis" id="penuli" value="<?= $buku["penulis"]; ?>" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="penerbit">Penerbit</label>
                                <input class="form-control" type="text" name="penerbit" id="peberbit" value="<?= $buku["penerbit"]; ?>" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="tahun">Terbit Tahun</label>
                                <input class="form-control" type="number" name="Year" id="tahun" value="<?= $buku["tahunterbit"]; ?>" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="isbn">nomor ISBN</label>
                                <input class="form-control" type="number" name="ISBN" id="isbn" value="<?= $buku["ISBN"]; ?>" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="kategori"> Kategori</label>
                                <select name="kategori" id="kategori" class="custom-select">
                                    <option selected>Pilih Kategori Buku</option>
                                    <?php 
                                        $sel = mysqli_query($connect, "SELECT * FROM kategori") or die(mysqli_error($connect));
                                        while($datas = mysqli_fetch_array($sel)){ ?>
                                        <option value="<?= $datas['id_cat']; ?>"><?= $datas['nama_kategori']; ?></option>
                                        <?php } ?>
                                </select>
                            </div><br>
                            <button class="btn btn-primary" type="submit" name="ubah">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<?php require_once('../template/footer1.php') ?>