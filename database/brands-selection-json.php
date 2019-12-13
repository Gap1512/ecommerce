<?php
    require 'database-connection.php';
    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Brands");
    $resultArray = pg_fetch_all($result);
    header('Content-Type: application/json');
    echo json_encode($resultArray);

    pg_close($connection);

?>
