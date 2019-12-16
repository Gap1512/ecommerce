<?php

    require './database-connection.php';

    $connection=databaseConnection();
    pg_prepare($connection, "delete", 'DELETE FROM web.managers WHERE managerid=$1');

    include './init-products-fields.php';
    
    pg_execute($connection, "order", array($_POST['id']));
    $result=pg_execute($connection, "delete", array($_POST['id']));


    
    pg_close($connection);

?>
