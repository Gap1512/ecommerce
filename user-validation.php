<?php

session_start();

function validadeUser($adminOnly=FALSE){

    if(!isset($_SESSION['admin'])){
        echo 'You cannot access this without <a href="/ecommerce/login.html">login</a><br>';
        die();
    } else {
        if(!$_SESSION['admin'] and $adminOnly){
            echo 'You do not have permission to access this content, consider <a href="/ecommerce/create-account.html">join us as an administrator</a><br>';
            die;
        }
    }
    loginInfo();
}

function loginInfo(){
    if(isset($_SESSION['customerFirstName']) and isset($_SESSION['customerLastName'])){
        echo "You are logged as ".$_SESSION['customerFirstName']." ".$_SESSION['customerLastName'];
        echo '<form action="/ecommerce/logout.php" method="post">';
        echo '<input type="hidden" name="returnPage" value='.$_SERVER["REQUEST_URI"].'>';
        echo '<input type="submit" value="Logout"></form><br>';
    }
}
        

?>
