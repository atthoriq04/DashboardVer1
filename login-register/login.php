<?php
    require '../dashboard/proses.php'; //File Config untuk Connect ke Database, dipindah ke halaman Proses pada folder dashboard.
    // Fungsi If tidak akan berjalan jika Login belum di Set.
    if (isset($_POST['Login'] ) ){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email'");    //Untuk Apakah pengguna telah terdaftar/ belum.
        
        if(mysqli_num_rows($user)=== 1){
            $pass = mysqli_fetch_assoc($user); // Untuk mengambil data yang ada lalu menyiapkannya untuk proses selanjutnya.
           if( password_verify($password, $pass['Password'])){ // Menguji Apakah password yang dimasukkan User sama dengan Enkripsi password yang ada di Database
                $_SESSION["User"] = true;
                header("location:../dashboard/homepage.php");
                exit;
           }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>LOGIN</title>
        
        <link rel="stylesheet" href="../style/css/bootstrap.css">
        <link rel="stylesheet" href="../style/style.css">
        
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    </head>
    
    <?php if(isset($error)){?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Email/Password Salah, Gagal Masuk!
            </div>
        </div>
    <?php } ?>
    
    <?php
        if(isset( $_SESSION["User"])){
            header('location:../dashboard/homepage.php'); 
        }
    ?>
    
    <body>
        
        <div id="side">
            <a href="../index.php" class="nav-link">Kembali ke Home</a>
        </div>
        
        <div class="container s" id="mark">
            <div class="row justify-content-center">
                <div class="col col-sm-5 rounded " id="log">
                    <form action="" method="POST">
                        <input type="email" class="form-control" name="email" placeholder=" Email" autocomplete="off" width="30px"> <br>
                        <input type="password" class="form-control" name="password" placeholder=" password" autocomplete="off"> <br>
                        <button type="submit" class="btn btn-primary" name="Login">Log In</button>
                    </form>
                </div>
            </div>
        </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php Require_once('../template/footer1.php'); ?>