<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.managers");

    while($customer=pg_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$customer['managerid'].'</td>';
        echo '<td>'.$customer['email'].'</td>';
        echo '<td>'.$customer['password'].'</td>';
        echo '<td>'.$customer['firstname'].'</td>';
        echo '<td>'.$customer['lastname'].'</td>';
        echo '<td>'.$customer['cpf'].'</td>';
        echo '<td>'.$customer['birthdate'].'</td>';
        echo '<td>'.$customer['adress'].'</td>';
        echo '<td>'.$customer['cep'].'</td>';
        echo '</tr>';
    }

    pg_close($connection);

?>
