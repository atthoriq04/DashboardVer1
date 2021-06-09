<?php 
session_start();
    require '../dashboard/proses.php'; //File Config untuk Connect ke Database, dipindah ke halaman Proses pada folder dashboard.
    if(isset($_POST['regis']) ){
        // Jika isi dari Fungsi telah ada, Maka User dimasukan ke dalam Database
        if (pendaftar($_POST) > 0){
            Echo "<script>
                    alert ('user berhasil didaftarkan!');
            </script>";
            header("location:login.php");
        }else{
            //menampilkan pesan Error jika Register Gagal
            echo mysqli_error($connect);
        }
    }
    if(isset( $_SESSION["User"])){
        header('location:../dashboard/homepage.php'); 
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Register</title>
        
        <link rel="stylesheet" href="../style/css/bootstrap.css">
        <link rel="stylesheet" href="../style/style.css">
        
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <body>
   
   
    <div id="side">
            <a href="../index.php" class="nav-link">Kembali ke Home</a>
    </div>
   
    <div class="container text-center" id="mark">
        <div class="row justify-content-center"> 
            <div class="col col-sm-5 rounded " id="reg">
                <form action="" method="POST">
                    <input type="text" class="form-control" name="username" placeholder=" Buat Username" autocomplete="off"><br>
                    <input type="email"  class="form-control" name="Remail" placeholder=" Masukan Email" autocomplete="off"><br> 
                    <input type="password" class="form-control"name="Rpassword" placeholder=" Buat Password" autocomplete="off"><br>
                    <input type="password" class="form-control" name="Rpassword2" placeholder=" Repeat Password" autocomplete="off"><br>
                    <button type="submit"class="btn btn-primary" name="regis">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
<?php Require_once('../template/footer1.php'); ?>