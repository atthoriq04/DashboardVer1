<?php require_once('../template/Dasheader.php')?>
<?php
    require 'proses.php';
    // Membuat Formula untuk melakukan Pagination
    $limit = 10;
    $total = count(querytampil("SELECT * FROM databuku"));
    $halaman = ceil($total / $limit);
    $aktif = (isset($_GET["p"] )) ? $_GET["p"] : 1;
    $mulai = ($limit * $aktif) - $limit;


    //Proses menampilkan keseluruhan data bersama dengan Pagination
    $data = querytampil("SELECT * FROM databuku INNER JOIN kategori ON databuku.id_cat = kategori.id_cat LIMIT $mulai, $limit ");

    //menguji data yang dicari, mencocokkan dengan yang ada pada database
    if (isset($_POST["search"]) ){
        $hasil = $_POST["cari"];
        $data = querytampil("SELECT * FROM databuku INNER JOIN kategori ON databuku.id_cat = kategori.id_cat WHERE 
        nama_kategori LIKE '%$hasil%' OR
        judulbuku LIKE '%$hasil%' OR
        penulis LIKE '%$hasil%' OR
        penerbit LIKE '%$hasil%' OR
        tahunterbit LIKE '%$hasil%' OR
        ISBN LIKE '%$hasil%' ");
    }


?>
        
        <?php
            //mengecek Session yang telah diset saat login
            session_start();
            if(isset( $_SESSION["User"])){ ?>
        <?php
            }else{
                header('location:../index.php');
            }
        ?>
        <h1 class="mt-3">Data - Data Buku</h1>


        
        <br>
        <!-- Form untuk Meelakukan pencarian -->
        
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" name="cari" placeholder="cari data..." autofocus autocomplete="off">
                <div class="input-group-append">
                    <button type="submit" name="search" id="sub" class="btn btn-primary">Search</button>
                </div>
            </div>          
        </form>
        <br>



        <!-- Menampilkan Nomor Halaman Pagination -->
        <div class="container">
            <div class="row mx-auto pb-1" style="width : 200px;">
                <div class="col-sm-12">
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <?php if($aktif > 1) : ?>
                                <li class="page-item"><a class="page-link" href="?p=<?= $aktif - 1;  ?>">Previous</a></li>
                            <?php endif; ?>
                            <?php for($i = 1 ; $i <= $halaman; $i++ ) : ?>
                                <?php if($i == $aktif): ?>
                                    <li class="page-item"><a class="page-link" href="?p=<?= $i ?>"> <?= $i ?></a></li>
                                <?php else : ?>
                                    <li class="page-item"><a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php if($aktif < $halaman) : ?>
                                <li class="page-item"><a class="page-link" href="?p=<?= $aktif + 1;  ?>">Next</a></li>
                            <?php endif; ?> 
                        </ul>
                    </nav>
                </div>
            </div>
        </div>



        <!-- Tabel Penyaji Data -->
        <div class="table-responsive-md  mx-2 pt-1">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col"> ISBN </th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($data as $buku) : ?>
                    <!-- Menampilkan data yang diproses di atas -->
                    <tr>
                        <td scope="row"><?= $buku["id"] ?></td>
                        <td><?= $buku["nama_kategori"] ?></td>
                        <td><?= $buku["judulbuku"] ?></td>
                        <td><?= $buku["penulis"] ?></td>
                        <td><?= $buku["penerbit"] ?></td>
                        <td><?= $buku["tahunterbit"] ?></td>
                        <td><?= $buku["ISBN"] ?></td>
                        <td><a href="ubah.php?id=<?= $buku["id"] ?>">Ubah</a> | <a href="hapus.php?id=<?= $buku["id"] ?>" onclick="return confirm('Yakin');">Hapus</a></td>
                    </tr>
                    <?php endforeach; ?>
            </table> 
        </div>
    

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php require_once('../template/footer1.php') ?>