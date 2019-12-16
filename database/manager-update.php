<?php


    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "update", 'UPDATE web.managers SET Email=$1, Password=$2, FirstName=$3, LastName=$4, CPF=$5, BirthDate=$6, Adress=$7, Cep=$8
        WHERE managerid=$9');

    include 'init-customers-fields.php';

    $result = pg_execute($connection, "update",
              array($_POST['email'],
              $_POST['password'],
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['cpf'],
                    $_POST['birthdate'],
                    $_POST['adress'],
                    $_POST['cep'],
                    $_POST['id']
                    ));



    pg_close($connection);


?>
