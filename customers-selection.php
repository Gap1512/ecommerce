<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Customers");

    echo '<select multiple name="Customers[]">';

    while($customer=pg_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$customer['customerid'].'</td>';
        echo '<td>'.$customer['email'].'</td>';
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
