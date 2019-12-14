<?php

    session_start();

if(!isset($_SESSION['productsList'])) $_SESSION['productsList'] = NULL;
} else {

    $connection = databaseConnection();

    pg_prepare($connection, "select", 'SELECT * FROM web.Products WHERE productId=$1');

    foreach($_SESSION['productsList'] as $id => $quantity){
        $result = pg_execute($connection, "select", array($id));
        $product = pg_fetch_assoc($result);
        echo '<tr><td>'.$product['productid'].'</td>';
        echo '<td>'.$product['productname'].'</td>';
        echo '<td>'.$product['productprice'].'</td>';
        echo '<td>'.$product['productdescription'].'</td>';
        echo '<td>'.$product['productstock'].'</td>';
        echo '<td>'.$product['productweight'].'</td>';
        echo '<td>'.$product['productvolume'].'</td>';
        echo '<td>'.$product['productrating'].'</td>';
        echo '<td>'.$product['productadress'].'</td>';
        echo '<td>'.$product['productcep'].'</td>';
        echo '</tr>';
    }

    pg_close($connection);

?>
