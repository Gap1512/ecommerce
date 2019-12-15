<?php

if(!isset($_SESSION['productsList'])) $_SESSION['productsList'] = NULL;
else {

    $connection = databaseConnection();

    pg_prepare($connection, "select", 'SELECT * FROM web.Products WHERE productId=$1');

    foreach($_SESSION['productsList'] as $id => $quantity){
        $result = pg_execute($connection, "select", array($id));
        $product = pg_fetch_assoc($result);
        echo '<tr><td>'.$product['productname'].'</td>';
        echo '<td>'.$product['productprice'].'</td>';
        echo '<td>'.$quantity.'</td>';
        echo '<td>'.($quantity * $product['productprice']).'</td></tr>';
    }

    pg_close($connection);
}

?>
