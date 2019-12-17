<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "insert", 'INSERT INTO web.managers (Email, Password, FirstName, LastName, CPF, BirthDate, Adress, Cep) VALUES($1, $2, $3, $4, $5, $6, $7, $8) RETURNING customerid');

    include 'init-customers-fields.php';

    $result = pg_execute($connection, "insert",
                         array($_POST['email'],
                               $_POST['password'],
                               $_POST['firstname'],
                               $_POST['lastname'],
                               $_POST['cpf'],
                               $_POST['birthdate'],
                               $_POST['adress'],
                               $_POST['cep'],
                         ));


    $id=pg_fetch_result($result, 0, 0);
    pg_close($connection);
    echo $id;

?>
