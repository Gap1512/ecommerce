<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    $query=pg_prepare($connection, "insert",
                      'INSERT INTO web.Categories(CategoryName) VALUES($1)');

    $result = pg_execute($connection, "insert", array($_POST['categoryName']));

    echo ($result)?'Category inserted on database':'It was not possible to insert';

    pg_close($connection);

?>
