<?php

    require 'database-connection.php';

    include 'init-brands-fields.php';

    $connection=databaseConnection();

    $query=pg_prepare($connection, "insert",
                      'INSERT INTO web.Brands(BrandName, BrandRating) VALUES($1, $2)');

    $result = pg_execute($connection, "insert", array($_POST['brandName'], $_POST['brandRating']));

    echo ($result)?'Brand inserted on database':'It was not possible to insert';

    pg_close($connection);

?>
