<?php

    require 'database-connection.php';

    session_start();

    function login($table, $admin)
    {

        $connection=databaseConnection();

        pg_prepare($connection, $table, 'SELECT * FROM web.'.$table.' WHERE email=$1 AND password=$2');

        $result=pg_execute($connection, $table, array($_POST['customerEmail'], $_POST['customerPassword']));
        $details=pg_fetch_assoc($result);

        if ($details !== FALSE) {

            $_SESSION['customerEmail'] = $details['email'];
            $_SESSION['customerFirstName'] = $details['firstname'];
            $_SESSION['customerLastName'] = $details['lastname'];
            $_SESSION['customerCPF'] = $details['cpf'];
            $_SESSION['customerBirthDate'] = $details['birthdate'];  
            $_SESSION['customerAdress'] = $details['adress'];
            $_SESSION['customerCEP'] = $details['cep'];
            $_SESSION['admin'] = $admin;

            header("Location: /ecommerce/index.php");
            die();
            
        }

        else return false;

        pg_close($connection);
    }

    if (!login('Managers', TRUE)) {
        if (!login('Customers', FALSE)) {
            echo 'Incorrect email or password, please 
                <a href="/ecommerce/login.php" target="_blank">try again </a> or <a href="/ecommerce/create-account.php" target="_blank">create an account</a><br>';
        }
    }

?>
