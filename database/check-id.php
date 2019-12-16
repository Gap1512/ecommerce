<?php
    require 'database-connection.php';
    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT 1 FROM web.".$_POST['tabela']." WHERE ".$_POST['campo']."=".$_POST['id']);

    echo pg_fetch_result($result, 0, 0);

    pg_close($connection);
?>
