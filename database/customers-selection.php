<?php

    $connection = databaseConnection();

    $result=pg_query($connection, "SELECT * FROM web.Customers");

    while($details=pg_fetch_assoc($result)){
        echo '<tr><td>'.$details['customerid'].'</td>';
        echo '<td>'.$details['email'].'</td>';
        echo '<td>'.$details['firstname'].'</td>';  
        echo '<td>'.$details['lastname'].'</td>';
        echo '<td>'.$details['cpf'].'</td>';
        echo '<td>'.$details['birthdate'].'</td>';  
        echo '<td>'.$details['adress'].'</td>';  
        echo '<td>'.$details['cep'].'</td>';            
        echo '</tr>';
    }

    pg_close($connection);

?>
