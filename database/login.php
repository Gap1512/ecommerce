<?php

    session_start();

function login($table, $admin){

    require 'database-connection.php';

    $connection=databaseConnection();

    pg_prepare($connection, "details", 'SELECT * FROM web.'.$table.' WHERE email=$1 AND password=$2');

    $result=pg_execute($connection, "details", array($_POST['customerEmail'], $_POST['customerPassword']));
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

        header("Location: /ecommerce/initial-page.php");
        die();
        
    }

    else echo 'Incorrect email or password, please 
        <a href="/ecommerce/login.html" target="_blank">try again </a> or <a href="/ecommerce/create-account.html" target="_blank">create an account</a><br>';

    pg_close($connection);

}

    if (!isset($_POST['admin'])) login('Customers', FALSE);
    else login('Managers', TRUE);

?>
