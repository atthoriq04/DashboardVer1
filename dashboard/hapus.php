<?php
    require("proses.php");
    $id = $_GET["id"];
    session_start();
    
    if(isset( $_SESSION["User"])){
        if (delete($id) > 0){
            if(delete($_POST) > 0 ){
                header("location:DATA.php");
        }   else{
                header("location:DATA.php");
        }}
    }else{
        header('location:../index.php');

    }

?>