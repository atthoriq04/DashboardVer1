<?php Require_once('../template/Dasheader.php'); ?>
    <?php require("proses.php"); ?>
            <?php
                session_start();
                if(isset( $_SESSION["User"])){ ?>
            <?php
                }else{
                    header('location:../index.php');
                }
            ?>
            
            <!-- Header Besar  -->
            <div class="jumbotron">
                <h1> Selamat Datang </h1>
                <P> Status Data Buku </P>
            </div>
            <br>
            
            
            <!-- Kartu Ringkasan Data dari Web  -->
            <section>
                <div class="container">
                    <div class="row justify-content-center pt-3">
                        <div class="col text-center">
                            <h2>Home</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col col-md-5">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-header ch">
                                    <h3>Jumlah Buku</h3>
                                </div>
                                <div class="card-body cb text-center">
                                    <?php 
                                        $jbuku = count(querytampil("SELECT * FROM databuku"));
                                    ?>
                                    <p class="card-text">Jumlah Buku : <?= $jbuku; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-5">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-header ch">
                                    <h3>Jumlah Kategori Buku</h3>
                                </div>
                                <div class="card-body cb text-center">
                                    <?php 
                                        $Jumlahkategori = count(kat("SELECT * FROM kategori "));
                                    ?>
                                    <p class="card-text">Jumlah Kategori : <?= $Jumlahkategori; ?><a href="kategori.php">,Lihat?</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col col-md-5">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-header ch">
                                    <h3>jumlah Penerbit </h3>
                                </div>
                                <div class="card-body cb text-center">
                                    <?php 
                                        $Jumlahpenerbit = count(kat("SELECT DISTINCT penerbit FROM databuku "));
                                    ?>
                                    <p class="card-text">Jumlah Penerbit : <?= $Jumlahpenerbit; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-5">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-header ch">
                                    <h3>Buku Terakhir yang ditambahkan</h3>
                                </div>
                                <div class="card-body cb text-center">
                                    <?php
                                        $akhir = querytampil("SELECT * FROM databuku");
                                        $Buter = count(querytampil("SELECT * FROM databuku"));
                                        $terakhir = ($Buter - 1);
                                    ?>
                                    <p class="card-text"><?= $akhir["$terakhir"]["judulbuku"]?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php require_once('../template/footer1.php') ?>