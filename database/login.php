<?php

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.Customers WHERE email=$1 AND password=$2');

    $result=pg_execute($connection, "details", array($_POST['customerEmail'], $_POST['customerPassword']));
        $details=pg_fetch_assoc($result);

    if ($details !== FALSE) {
        session_start();
        $_SESSION['customerEmail'] = $details['email'];
        $_SESSION['customerFirstName'] = $details['firstname'];  
        $_SESSION['customerLastName'] = $details['lastname'];
        $_SESSION['customerCPF'] = $details['cpf'];
        $_SESSION['customerBirthDate'] = $details['birthdate'];  
        $_SESSION['customerAdress'] = $details['adress'];  
        $_SESSION['customerCEP'] = $details['cep'];
        $_SESSION['admin'] = FALSE;

        echo 'Success';
    }

    else echo 'User not found, please <a href="/ecommerce/create-account.html" target="_blank">create an account</a><br>';

    pg_close($connection);

?>
