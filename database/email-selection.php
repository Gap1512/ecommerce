<?php
    require 'database-connection.php';

    $connection=databaseConnection();

    $result = pg_query($connection, 'SELECT email FROM web.customers');

    $emails = [];
    while($email=pg_fetch_assoc($result)){
        array_push($emails, $email);
    }

    pg_close($connection);

    echo json_encode($emails);

?>