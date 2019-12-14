<?php

session_start();

function validadeUser($adminOnly=FALSE){

    if(!isset($_SESSION['admin'])){
        echo 'You cannot access this without <a href="/ecommerce/login.php">login</a><br>';
        die();
    } else {
        if(!$_SESSION['admin'] and $adminOnly){
            echo 'You do not have permission to access this content, consider <a href="/ecommerce/create-account.php">join us as an administrator</a><br>';
            die;
        }
    }
}

function loginInfo(){
    if(isset($_SESSION['customerFirstName']) and isset($_SESSION['customerLastName'])){
        echo "You are logged as ".$_SESSION['customerFirstName']." ".$_SESSION['customerLastName'];
        echo '<form action="/ecommerce/logout.php" method="post">';
        echo '<input type="hidden" name="returnPage" value='.$_SERVER["REQUEST_URI"].'>';
        echo '<input type="submit" value="Logout"></form><br>';
    }
}

function getUserCompleteName(){
    if(isLoggedIn()){
        return $_SESSION['customerFirstName']." ".$_SESSION['customerLastName'];
    }
    return "";
}

function isLoggedIn(){
    if(isset($_SESSION['customerFirstName']) and isset($_SESSION['customerLastName'])){
        return true;
    }
    return false;
}

function setStyleVisibility($boolFunction,$inverse = false){
    if(!$boolFunction() xor $inverse) echo 'style="display:none;"';
}

?>
