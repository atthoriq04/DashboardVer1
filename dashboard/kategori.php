<?php require_once('../template/Dasheader.php')?>
<?php
    require 'proses.php';
    
   
    
    $data = querytampil("SELECT * FROM kategori ORDER BY id_cat ASC");
    

    // proses tambah Kategori
    if(isset($_POST['tambah_kategori']) ){
        if(insert_kategori($_POST) >0 ){
            echo "<script>alert('Kategori berhasil ditambah ditambah, silahkan isi Data');
            document.location.href= 'input.php';
            </script>";
        }else{
            echo "<script>alert('kategori gagal ditambah')
            </script>";
        }
        
    }

    //proses edit kategori
    if(isset($_POST["edit_kategori"]) ){

        if(ubah_kategori($_POST) >0){
            echo "<script>alert('Data berhasil diubah');
            document.location.href= 'kategori.php';
            </script>";
        }else{
            echo "<script>alert('Data gagal diubah')
            </script>";
        }

    }

    //proses hapus kategori
    if(isset($_POST["hapus_kategori"] ) ){
        if(delete_kategori($_POST) > 0 ){
            header("location:kategori.php#data");
    }   else{
            header("location:kategori.php");
    }}
    

?>
      
        <?php
       session_start();
            if(isset( $_SESSION["User"])){ ?>
        <?php }else{
            header('location:../index.php');
        } ?> 
        
        <h1 class="mt-3">Menu Kategori</h1>
        <hr>
        

        <!-- Data Kategori -->
        <h3 class="text-center mt-5"> Data Kategori</h3>
        <hr class="mb-2">

        <div class="container kategori" id="data">
        <div class="table-responsive-sm  mx-2 pt-1">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($data as $buku) : ?>
                    <!-- Menampilkan data yang diproses di atas -->
                    <tr>
                        <td scope="row"><?= $buku["id_cat"] ?></td>
                        <td><?= $buku["nama_kategori"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                    <td><a href="#edit">Ubah</a></td>
                    <td><a href="#hapus">Hapus</a></td>
                    </tr>
                </tbody>
            </table> 
        </div>
        </div>

        
        <!-- Tambah kategori -->
        
        <section>
            <div class="container mt-3 pt-3 kategori" >
                <div class="row justify-content-center  mt-5">
                    <div class="col col-sm-8"> 
                        <h3 class="text-center"> Tambah Kategori</h3>
                        <hr class="mb-5">
                    </div>
                </div>
                <div class="row  justify-content-center">
                    <div class="col-sm-10">
                        <form action="" Method="POST">
                            <div class="form-gorup">
                                <label for="Nama-kategori">Nama Katagori</label>
                                <input class="form-control" type="text" name="nama" id="Nama-kategori" placeholder="Masukkan Nama yang ingin ditambahkan" required autocomplete="off">
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit" name="tambah_kategori">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>


         <!-- Edit Kategori  -->
        <section id="edit">
            <div class="container mt-3 pt-3 kategori">
                <div class="row justify-content-center  mt-5">
                    <div class="col col-sm-8"> 
                        <h3 class="text-center"> Edit Kategori</h3>
                        <hr class="mb-5">
                    </div>
                </div>
                <div class="row  justify-content-center">
                    <div class="col-sm-10">
                        <form action="" Method="POST">
                            <div class="form-gorup">
                                <label for="id">ID Katagori yang ingin diubah</label>
                                <input class="form-control " type="text" name="id" id="id" placeholder="Masukkan id kategori yang ingin diubah"required autocomplete="off">
                            </div>
                            <div class="form-gorup">
                                <label for="Nama-kategori">Nama Katagori</label>
                                <input class="form-control" type="text" name="nama" id="Nama-kategori" placeholder="Masukkan Nama baru" required autocomplete="off">
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit" name="edit_kategori">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section id="hapus">
            <div class="container">
                <div class="row justify-content-center  mt-5">
                    <div class="col col-sm-7"> 
                        <h3 class="text-center"> Hapus Kategori</h3>
                        <hr class="mb-5">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <form action="" method="POST">
                            <div class="input-group">
                                <input type="number" class="form-control" name="id" placeholder="Id kategori yang dihapus" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="submit" name="hapus_kategori" class="btn btn-danger"  onclick="return confirm('Yakin? Tekan OK bila sudah menginput Id dengan benar');">Hapus</button>
                                </div>
                            </div>          
                        </form>
                    </div>
                </div>
            </div>
        </section>
        

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php require_once('../template/footer1.php') ?>