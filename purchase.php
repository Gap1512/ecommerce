<?php


require 'database/database-connection.php';
require 'user-validation.php';

validadeUser(FALSE);

if(!isset($_SESSION['productsList'])) $_SESSION['productsList'] = NULL;
else {

    $connection = databaseConnection();

    pg_prepare($connection, "update", 'UPDATE web.Products SET productStock = productStock - $1 WHERE productId=$2');

    foreach($_SESSION['productsList'] as $id => $quantity){
        pg_execute($connection, "update", array($quantity, $id));
    }

    pg_close($connection);

    unset($_SESSION['productsList']);

    header("Location: index.php");
    die();
}

?>
