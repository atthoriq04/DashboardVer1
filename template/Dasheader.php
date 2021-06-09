<html>
    <head>
        <link rel="icon" type="image/png" href="../log.png">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Dashboard</title>

        <link rel="stylesheet" href="../style/css/bootstrap.css">
        <link rel="stylesheet" href="../template/1.css">

        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>
    <body>

    <!-- Navbar  -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="homepage.php">
                <img src="../log.png" width="35" height="35" alt="Private books List">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="DATA.php">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="input.php">Add Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori.php">Menu Kategori <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form action="" method="POST" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Logout</button>
                </form>
            </div>
        </nav>

    <?php
        if(isset($_POST["logout"])){
            session_start();
            session_destroy();
            session_unset();
            header('location:../index.php');
        } 
    ?>