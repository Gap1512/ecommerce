<?php

session_start();

if(!isset($_POST['productID']) and !isset($_POST['productQuantity'])){
    echo "Please select the quantity";
    die();
} else {
    $_SESSION['productsList'][$_POST['productID']] += $_POST['productQuantity'];
    header("Location: cart.php");
    die();
}

?>
