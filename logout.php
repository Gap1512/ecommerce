<?php

session_start();

if(!isset($_POST['returnPage'])) $_POST['returnPage']='index.php';

    if(isset($_SESSION['customerEmail'])){
        session_unset();
    }
    header("Location: ".$_POST['returnPage']);
    die();
        
?>
