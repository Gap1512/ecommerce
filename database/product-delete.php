<?php

    require './database-connection.php';

    $connection=databaseConnection();
    pg_prepare($connection, "delete", 'DELETE FROM web.Products WHERE productid=$1');
    pg_prepare($connection, "brands", 'DELETE FROM web.productbrands WHERE productid=$1');
    pg_prepare($connection, "categories", 'DELETE FROM web.productcategories WHERE productid=$1');

    include './init-products-fields.php';
    
    pg_execute($connection, "brands", array($_POST['id']));
    pg_execute($connection, "categories", array($_POST['id']));
    $result=pg_execute($connection, "delete", array($_POST['id']));


    
    pg_close($connection);

?>
