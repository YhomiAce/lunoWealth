<?php
    session_start();
    require_once "../config/db.php";
    require_once "../config/actions.php";
    
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
        die;
    }

    $currentEmail = $_SESSION['user'];

    $email =  $_SESSION['user'];
    $user = currentUser($conn,$email);
    
?>