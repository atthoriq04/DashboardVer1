<?php require_once('../template/Dasheader.php')?>
<?php
    require 'proses.php';

    //Proses menambahkan data yang dilakukan dari file proses.php
    if(isset($_POST['tambah']) ){
        if(insert($_POST) >0 ){
            echo "<script>alert('Data berhasil ditambah');
            document.location.href= 'DATA.php';
            </script>";
        }else{
            echo "<script>alert('Data gagal ditambah')
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
        

        <!-- Form Input Data  -->

        <h1 class="mt-3">Masukan Buku ke Database</h1>
        <hr>
        <section>
            <div class="container mt-3 pt-3">
                <div class="row  justify-content-center">
                    <div class="col-sm-10">
                        <form action="" Method="POST">
                            <div class="form-gorup">
                                <label for="Judul">Judul Buku</label>
                                <input class="form-control"type="text" name="judul" id="Judul" placeholder="Masukkan Judul Buku" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="penulis">Nama Penulis</label>
                                <input class="form-control" type="text" name="penulis" id="penulis" placeholder="Masukkan Nama Penulis" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="penerbit">Penerbit</label>
                                <input class="form-control" type="text" name="penerbit" id="penerbit" placeholder="Masukkan Nama penerbit" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="tahun">Terbit Tahun</label>
                                <input class="form-control" type="number" name="Year" id="tahun" placeholder="Masukan Tahun terbit" required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="isbn">nomor ISBN</label>
                                <input class="form-control" type="number" name="ISBN" id="isbn" placeholder="Masukkan nomor ISBN" required autocomplete="off">
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
                                    <option >Jika kategori tidak ada, <a href="kategori.php">Buat Kategori terlebih dulu</a></option>
                                </select>
                            </div><br>
                            <button class="btn btn-primary" type="submit" name="tambah">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php require_once('../template/footer1.php') ?>