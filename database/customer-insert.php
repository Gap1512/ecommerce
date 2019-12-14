<?php

function register($table, $admin){

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "insert", 'INSERT INTO web.'.$table.'(Email, Password, FirstName, LastName, CPF, BirthDate, Adress, Cep) VALUES($1, $2, $3, $4, $5, $6, $7, $8)');

    include 'init-customers-fields.php';

    $result = pg_execute($connection, "insert",
              array($_POST['customerEmail'],
                    $_POST['customerPassword'],
                    $_POST['customerFirstName'],
                    $_POST['customerLastName'],
                    $_POST['customerCPF'],
                    $_POST['customerBirthDate'],
                    $_POST['customerAdress'],
                    $_POST['customerCEP']));

    if ($result !== FALSE) {
        header("Location: /ecommerce/index.php");
        die();
    }
    else echo 'An error ocurred, it was not possible to create an account';

    pg_close($connection);

}

    if (!isset($_POST['admin'])) register('Customers', FALSE);
    else register('Managers', TRUE);

?>
