<?php

    require './database-connection.php';

    $connection=databaseConnection();
    pg_prepare($connection, "delete", 'DELETE FROM web.customers WHERE customerid=$1');
    pg_prepare($connection, "order", 'DELETE FROM web.orders WHERE customerid=$1');

    include './init-products-fields.php';
    
    pg_execute($connection, "order", array($_POST['id']));
    $result=pg_execute($connection, "delete", array($_POST['id']));


    
    pg_close($connection);

?>
